<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class TicketController extends Controller
{
  public function newTicket($userid) {
    $ticket = new Ticket;
    $ticket->user_id = $userid;
    $ticket->token = Uuid::uuid4();
    $ticket->revoked = 0;
    $ticket->save();
  }

  public function getTicket($ticketid) {
    $ticket = Ticket::where('id', $ticketid)->first();
    if ($ticket != null) {
      return $ticket;
    }

    throw new Exception("The ticket ID specified was not found.");
  }

  public function revokeTicket($ticketid) {
    $ticket = getTicket($ticketid);
    $ticket->revoked = 1;
    $ticket->save();
  }

  public function getToken($ticketid) {
    $ticket = getTicket($ticketid);
    return $ticket->token;
  }
}
