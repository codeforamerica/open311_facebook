<h1>Thank you for your submission.</h1>
<p><?=$response->request->service_notice?></p>
<p>Your service request ID is <?=$response->request->service_request_id?>. <?=SUCCESS_MESSAGE?></p>
<p><?=anchor($this->session->userdata('medium'), 'Back')?></p>