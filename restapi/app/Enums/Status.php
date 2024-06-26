<?php

namespace App\Enums;

enum Status: string
{
  case ACCEPT = 'accepted';
  case DECLINED = 'declined';
  case PENDING = 'pending';
}
