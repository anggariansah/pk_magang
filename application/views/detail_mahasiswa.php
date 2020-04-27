
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Detail Mahasiswa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">



</head>

<body>
<div class="card">
  <div class="card-body mb-4">

    <div class="card" style="width: 25rem;">
  <div class="card-body">
    <h3 class="card-title"> <strong> Detail Mahasiswa </strong></h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Nama		: Ramona Matovani</li>
    <li class="list-group-item">NIM 		: 4617010021</li>
    <li class="list-group-item">kelas		: TI 6A</li>
  </ul>
  </div>

<!-- Steps form -->


    <h2 class="text-center font-weight-bold pt-4 pb-5"><strong>Status Mahasiswa</strong></h2>

    <hr class="my-5">


    <!-- Stepper -->
    <div class="steps-form">
      <div class="steps-row setup-panel">
        <div class="steps-step">
          <a href="#step-9" type="button" class="btn btn-success btn-circle">1</a>
          <p>Magang</p>
        </div>
        <div class="steps-step">
          <a href="#step-10" type="button" class="btn btn-success btn-circle" disabled="disabled">2</a>
          <p>Bimbingan 1</p>
        </div>
        <div class="steps-step">
          <a href="#step-11" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
          <p>Bimbingan 2</p>
        </div>
        <div class="steps-step">
          <a href="#step-11" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
          <p>Bimbingan 3</p>
        </div>
        <div class="steps-step">
          <a href="#step-11" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
          <p>Sidang</p>
        </div>
      </div>
    </div>

    <form role="form" action="" method="post">

      <!-- First Step -->
  <!--     <div class="row setup-content" id="step-9">
        <div class="col-md-12">
          <h3 class="font-weight-bold pl-0 my-4"><strong>Step 1</strong></h3>
          <div class="form-group md-form">
            <label for="yourName" data-error="wrong" data-success="right">First Name</label>
            <input id="yourName" type="text" required="required" class="form-control validate">
          </div>
          <div class="form-group md-form mt-3">
            <label for="yourLastName" data-error="wrong" data-success="right">Last Name</label>
            <input id="yourLastName" type="text" required="required" class="form-control validate">
          </div>
          <div class="form-group md-form mt-3">
            <label for="yourAddress" data-error="wrong" data-success="right">Address</label>
            <textarea id="yourAddress" type="text" required="required" rows="2" class="md-textarea validate form-control"></textarea>
          </div>
          <button class="btn btn-indigo btn-rounded nextBtn float-right" type="button">Next</button>
        </div>
      </div> -->

      <!-- Second Step -->
      <!-- <div class="row setup-content" id="step-10">
        <div class="col-md-12">
          <h3 class="font-weight-bold pl-0 my-4"><strong>Step 2</strong></h3>
          <div class="form-group md-form">
            <label for="companyName" data-error="wrong" data-success="right">Company Name</label>
            <input id="companyName" type="text" required="required" class="form-control validate">
          </div>
          <div class="form-group md-form mt-3">
            <label for="companyAddress" data-error="wrong" data-success="right">Company Address</label>
            <input id="companyAddress" type="text" required="required" class="form-control validate">
          </div>
          <button class="btn btn-indigo btn-rounded prevBtn float-left" type="button">Previous</button>
          <button class="btn btn-indigo btn-rounded nextBtn float-right" type="button">Next</button>
        </div>
      </div> -->

      <!-- Third Step -->
      <!-- <div class="row setup-content" id="step-11">
        <div class="col-md-12">
          <h3 class="font-weight-bold pl-0 my-4"><strong>Step 3</strong></h3>
          <button class="btn btn-indigo btn-rounded prevBtn float-left" type="button">Previous</button>
          <button class="btn btn-default btn-rounded float-right" type="submit">Submit</button>
        </div>
      </div> -->

    </form>

  </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn'),
        allPrevBtn = $('.prevBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-indigo').addClass('btn-default');
            $item.addClass('btn-indigo');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allPrevBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepSteps = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

            prevStepSteps.removeAttr('disabled').trigger('click');
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i< curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-indigo').trigger('click');
});
	

</script>

<!-- Steps form -->

<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/dist/js/demo.js"></script>
</body>
</html>