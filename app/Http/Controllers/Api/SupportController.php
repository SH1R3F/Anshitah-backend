<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChatResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ChatCollection;
use App\Http\Resources\TicketResource;
use App\Http\Resources\SupportResource;
use App\Http\Resources\SupportCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportController extends Controller
{


    public function index(Request $request): JsonResource
    {
        $tickets = DB::table('support_tickets')
            ->join('users', 'users.id', '=', 'support_tickets.user_id')
            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'support_tickets.user_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->select('support_tickets.id', 'support_tickets.title', 'support_tickets.status', 'support_tickets.updated_at', 'users.id as userid', 'users.name as username', 'users.avatar', 'roles.name as rolename')
            ->when($request->q, function ($builder) use ($request) {
                return $builder
                    ->where('users.name', 'LIKE', "%{$request->q}%")
                    ->orWhere('support_tickets.title', 'LIKE', "%{$request->q}%");
            })
            ->orderBy('support_tickets.status', 'DESC')
            ->orderBy('support_tickets.id', 'DESC')
            ->limit(30)
            ->get();


        return SupportCollection::make($tickets);
    }

    public function ticket($id): JsonResponse
    {

        $ticket = DB::table('support_tickets')->where('support_tickets.id', $id)
            ->join('users', 'users.id', '=', 'support_tickets.user_id')
            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'support_tickets.user_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->orderBy('support_tickets.updated_at', 'ASC')
            ->select('support_tickets.id', 'support_tickets.title', 'support_tickets.status', 'support_tickets.updated_at', 'users.id as userid', 'users.name as username', 'users.avatar', 'roles.name as rolename')
            ->first();

        $messages = DB::table('support_messages')->where('ticket_id', $id)->orderBy('updated_at', 'ASC')->get();

        return response()->json([
            'ticket' => SupportResource::make($ticket),
            'chat' => ChatCollection::make($messages)
        ]);
    }

    public function close($id): Response
    {
        DB::table('support_tickets')->where('id', $id)->update(['status' => 0]);
        return response()->noContent(Response::HTTP_OK);
    }

    public function delete($id): Response
    {
        DB::table('support_tickets')->where('id', $id)->delete();
        return response()->noContent(Response::HTTP_OK);
    }

    public function message(Request $request, $id): JsonResource
    {

        $data = $request->validate([
            'body' => 'required',
            'attachment' => 'nullable'
        ]);

        $query = DB::table('support_tickets')->where('id', $id);
        $ticket = $query->first();
        $query->update(['updated_at' => Carbon::now()]);

        // Upload attachment base_64
        if ($request->attachment && preg_match('/^data:image\/(\w+);base64,/', $request->attachment)) {
            $path = upload_base64_image($request->attachment, 'support/' . time() . '-support.');
            $data['attachment'] = env('STORAGE_PATH') . 'app/public/' . $path;
        }

        $id = DB::table('support_messages')->insertGetId([
            'ticket_id' => $ticket->id,
            'body' => $data['body'],
            'attachment' => $data['attachment'],
            'user_id' => $ticket->user_id,
            'support_id' => Auth::user()->id,
            'sender' => 0,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        $message = DB::table('support_messages')->find($id);
        return ChatResource::make($message);
    }
}
