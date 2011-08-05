<?=$this->load->view('header')?>
<h1>Thank you for your submission.</h1>
<p><?=$response->request->service_notice?></p>
<? if($response->request->service_request_id): ?><p>Your service request ID is <?=$response->request->service_request_id?>.</p><? endif; ?>
<p><?=SUCCESS_MESSAGE?></p>
<p><?=anchor($this->session->userdata('medium'), 'Back')?></p>
<?=$this->load->view('footer')?>