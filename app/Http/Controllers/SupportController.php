<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{

    public function index()
    {
        return view('support.index' , [
            'title' => 'الدعم الفني',
            'tickets' => Support::tickets()
        ]);
    }



    public function show($id)
    {
        $ticket = DB::table('support_tickets')->where('support_tickets.id', $id)
        ->join('users', 'users.id', '=', 'support_tickets.user_id')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'support_tickets.user_id')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->orderBy('support_tickets.updated_at', 'ASC')
        ->select('support_tickets.id', 'support_tickets.title', 'support_tickets.status', 'support_tickets.updated_at', 'users.id as userid', 'users.name as username', 'users.avatar', 'roles.name as rolename')
        ->first();

        $messages = DB::table('support_messages')->where('ticket_id', $id)->orderBy('updated_at', 'ASC')->get();

        return view('support.show' , [
            'title'    => 'الدعم الفني',
            'ticket'   => $ticket,
            'messages' => $messages
        ]);
    }


    public function message(Request $request, $id)
    {
        $ticket = DB::table('support_tickets')->where('id', $id)->first();
        if ($ticket->status == 0) {
            return back();
        }
        // Validation
        $this->validate($request, [
            'message_body' => 'required',
            'attachment' => 'nullable|file'
        ]);

        // Upload the file
        if ($request->attachment) {
            // Save the new file
            $attachment = $request->file('attachment');
            $filename     = time() . '-support.' . $attachment->extension();
            Storage::disk('public')->putFileAs(
                'support',
                $attachment,
                $filename
            );
        }

        $inserted = DB::table('support_messages')->insert([
            'ticket_id'  => $id,
            'body'       => $request->message_body,
            'attachment' => isset($filename) ? env('STORAGE_PATH') . 'support/' . $filename : null,
            'user_id'    => $ticket->user_id,
            'support_id' => Auth::user()->id,
            'sender'     => 0,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ]);

        // Update updated_at of the ticket
        $updated = DB::table('support_tickets')->where('id', $id)->update([
            "updated_at" => \Carbon\Carbon::now()
        ]);
        return back();

    }


    public function toggle($id)
    {
        $ticket = DB::table('support_tickets')->where('id', $id)->first();
        DB::table('support_tickets')->where('id', $id)->update([
            'status' => $ticket->status == 1 ? 0 : 1
        ]);
        return back()->with('create' , $ticket->status == 1 ? 'تم غلق التذكرة' : 'تم إعادة فتح التذكرة');
    }

    public function destroy($id)
    {
        $deleted = DB::table('support_tickets')->where('id', $id)->delete();
        return back()->with('create' , 'تم حذف التذكرة بنجاح');
    }

    public function users_chat($id)
    {
        $ticket = DB::table('support_tickets')->where('support_tickets.id', $id)
        ->join('users', 'users.id', '=', 'support_tickets.user_id')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'support_tickets.user_id')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->orderBy('support_tickets.updated_at', 'ASC')
        ->select('support_tickets.id', 'support_tickets.title', 'support_tickets.status', 'support_tickets.updated_at', 'users.id as userid', 'users.name as username', 'users.avatar', 'roles.name as rolename')
        ->first();

        if ($ticket->userid != Auth::user()->id) {
            return back();
        }

        $messages = DB::table('support_messages')->where('ticket_id', $id)->orderBy('updated_at', 'ASC')->get();

        return view('support.users.show' , [
            'title'    => 'الدعم الفني',
            'ticket'   => $ticket,
            'messages' => $messages
        ]);
    }

    public function users_index()
    {
        return view('support.users.index' , [
            'title' => 'الدعم الفني',
            'tickets' => Support::user_tickets()
        ]);
    }

    public function users_message(Request $request, $id)
    {
        $ticket = DB::table('support_tickets')->where('id', $id)->first();
        if ($ticket->user_id != Auth::user()->id || $ticket->status == 0) {
            return back();
        }
        // Validation
        $this->validate($request, [
            'message_body' => 'required',
            'attachment' => 'nullable|file'
        ]);

        // Upload the file
        if ($request->attachment) {
            // Save the new file
            $attachment = $request->file('attachment');
            $filename     = time() . '-support.' . $attachment->extension();
            Storage::disk('public')->putFileAs(
                'support',
                $attachment,
                $filename
            );
        }

        $inserted = DB::table('support_messages')->insert([
            'ticket_id'  => $id,
            'body'       => $request->message_body,
            'attachment' => isset($filename) ? env('STORAGE_PATH') . 'support/' . $filename : null,
            'user_id'    => $ticket->user_id,
            'support_id' => null,
            'sender'     => 1,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ]);

        // Update updated_at of the ticket
        $updated = DB::table('support_tickets')->where('id', $id)->update([
            "updated_at" => \Carbon\Carbon::now()
        ]);
        return back();

    }



    /**
     * Inquires Section
     * For both management and usage
     */

    public function index_inquires()
    {
        return view('inquires.index' , [
            'title' => 'الإستفسارات',
            'tickets' => Support::tickets_inquires()
        ]);
    }


    public function show_inquires($id)
    {
        $ticket = DB::table('inquires_tickets')->where('inquires_tickets.id', $id)
        ->join('users', 'users.id', '=', 'inquires_tickets.user_id')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'inquires_tickets.user_id')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->orderBy('inquires_tickets.updated_at', 'ASC')
        ->select('inquires_tickets.id', 'inquires_tickets.title', 'inquires_tickets.status', 'inquires_tickets.updated_at', 'users.id as userid', 'users.name as username', 'users.avatar', 'roles.name as rolename')
        ->first();

        $messages = DB::table('inquires_messages')->where('ticket_id', $id)->orderBy('updated_at', 'ASC')->get();

        return view('inquires.show' , [
            'title'    => 'الإستفسارات',
            'ticket'   => $ticket,
            'messages' => $messages
        ]);
    }

    public function toggle_inquires($id)
    {
        $ticket = DB::table('inquires_tickets')->where('id', $id)->first();
        DB::table('inquires_tickets')->where('id', $id)->update([
            'status' => $ticket->status == 1 ? 0 : 1
        ]);
        return back()->with('create' , $ticket->status == 1 ? 'تم غلق التذكرة' : 'تم إعادة فتح التذكرة');
    }

    public function destroy_inquires($id)
    {
        $deleted = DB::table('inquires_tickets')->where('id', $id)->delete();
        return back()->with('create' , 'تم حذف التذكرة بنجاح');
    }


    public function message_inquires(Request $request, $id)
    {
        $ticket = DB::table('inquires_tickets')->where('id', $id)->first();
        if ($ticket->status == 0) {
            return back();
        }
        // Validation
        $this->validate($request, [
            'message_body' => 'required',
            'attachment' => 'nullable|file'
        ]);

        // Upload the file
        if ($request->attachment) {
            // Save the new file
            $attachment = $request->file('attachment');
            $filename     = time() . '-support.' . $attachment->extension();
            Storage::disk('public')->putFileAs(
                'support',
                $attachment,
                $filename
            );
        }

        $inserted = DB::table('inquires_messages')->insert([
            'ticket_id'  => $id,
            'body'       => $request->message_body,
            'attachment' => isset($filename) ? env('STORAGE_PATH') . 'support/' . $filename : null,
            'user_id'    => $ticket->user_id,
            'support_id' => Auth::user()->id,
            'sender'     => 0,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ]);

        // Update updated_at of the ticket
        $updated = DB::table('inquires_tickets')->where('id', $id)->update([
            "updated_at" => \Carbon\Carbon::now()
        ]);
        return back();

    }

    
    public function users_chat_inquires($id)
    {
        $ticket = DB::table('inquires_tickets')->where('inquires_tickets.id', $id)
        ->join('users', 'users.id', '=', 'inquires_tickets.user_id')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'inquires_tickets.user_id')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->orderBy('inquires_tickets.updated_at', 'ASC')
        ->select('inquires_tickets.id', 'inquires_tickets.title', 'inquires_tickets.status', 'inquires_tickets.updated_at', 'users.id as userid', 'users.name as username', 'users.avatar', 'roles.name as rolename')
        ->first();

        if ($ticket->userid != Auth::user()->id) {
            return back();
        }

        $messages = DB::table('inquires_messages')->where('ticket_id', $id)->orderBy('updated_at', 'ASC')->get();

        return view('inquires.users.show' , [
            'title'    => 'الإستفسارات',
            'ticket'   => $ticket,
            'messages' => $messages
        ]);
    }

    public function users_index_inquires()
    {
        return view('inquires.users.index' , [
            'title' => 'الإستفسارات',
            'tickets' => Support::user_tickets_inquires()
        ]);
    }

    public function users_message_inquires(Request $request, $id)
    {
        $ticket = DB::table('inquires_tickets')->where('id', $id)->first();
        if ($ticket->user_id != Auth::user()->id || $ticket->status == 0) {
            return back();
        }
        // Validation
        $this->validate($request, [
            'message_body' => 'required',
            'attachment' => 'nullable|file'
        ]);

        // Upload the file
        if ($request->attachment) {
            // Save the new file
            $attachment = $request->file('attachment');
            $filename     = time() . '-support.' . $attachment->extension();
            Storage::disk('public')->putFileAs(
                'support',
                $attachment,
                $filename
            );
        }

        $inserted = DB::table('inquires_messages')->insert([
            'ticket_id'  => $id,
            'body'       => $request->message_body,
            'attachment' => isset($filename) ? env('STORAGE_PATH') . 'support/' . $filename : null,
            'user_id'    => $ticket->user_id,
            'support_id' => null,
            'sender'     => 1,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ]);

        // Update updated_at of the ticket
        $updated = DB::table('inquires_tickets')->where('id', $id)->update([
            "updated_at" => \Carbon\Carbon::now()
        ]);
        return back();

    }
}