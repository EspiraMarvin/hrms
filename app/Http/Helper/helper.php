<?php

function getLeaveType($leave_id)
{
$result = \App\ApplyLeave::where('id', $leave_id)->first();
return $result->leave_type;

}
