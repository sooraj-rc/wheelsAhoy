
<section id="events">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="section-heading">EVENTS</h1>
                <hr class="my-4">
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-7">Lorem Ipsum is simply dummy text of the printing and typesetting</p>
            </div>
            <div class="container">
            <h4><strong>UPCOMING EVENTS</strong></h4>
            <div class="event1">
                <?php foreach($__events_up as $eve1) { ?> 
                <img src="<?php url('assets/uploads/events/'.$eve1['event_image']) ?>" alt="Events" style="margin: 15px;" class="rounded">
                <?php } ?>
            </div>
            <br><br>
            <h4><strong>PAST EVENTS</strong></h4>
            <div class="event2">
                <?php foreach($__events_past as $eve2) { ?> 
                <img src="<?php url('assets/uploads/events/'.$eve2['event_image']) ?>" alt="Events" style="margin: 15px;" class="rounded">
                <?php } ?>
            </div>

            </div>
        </div>
    </div>
</section>