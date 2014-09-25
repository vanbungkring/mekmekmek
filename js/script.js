jQuery(document).ready(function($) {
	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

		//On Click Event
		$("ul.tabs li").click(function() {

			$("ul.tabs li").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$(".tab_content").hide(); //Hide all tab content

			var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
			$(activeTab).fadeIn(); //Fade in the active ID content
			return false;
		});

	$('#loginform').addClass('col-md-12');
	$('#loginform input[type="text"]').attr('placeholder', 'Username');
	$('#loginform input[type="password"]').attr('placeholder', 'Password');

	$('#loginform label[for="user_login"]').contents().filter(function() {
		return this.nodeType === 3;
	}).remove();
	$('#loginform label[for="user_pass"]').contents().filter(function() {
		return this.nodeType === 3;
	}).remove();
	var link = $('p.link-forgot').html();
	// alert(link);
	$('#loginform .login-remember').html(link);

	/* Registration Ajax */
	jQuery('#registerform').submit(function(event){
	    // setup some local variables
	    var $form = $(this);
	    // let's select and cache all the fields
	    var $inputs = $form.find("input, select, button, textarea");
	    // get data in the form
		var action = 'register_action';
		var fullname = jQuery("#st-fullname").val();
		var username = jQuery("#st-username").val();
		var mail_id = jQuery("#st-email").val();
		var province = jQuery("#st-province").val();
		var company = jQuery("#st-company").val();
		var department = jQuery("#st-department").val();
		var passwrd = jQuery("#st-psw").val();
		var repsw = jQuery("#st-repsw").val();
		var ajaxdata = {
			action: 'register_action',
			fullname: fullname,
			username: username,
			mail_id: mail_id,
			company: company,
			province: province,
			department: department,
			passwrd: passwrd,
			repsw: repsw,
		};

		// let's disable the inputs for the duration of the ajax request
    	$inputs.prop("disabled", true);

	 	// fire off the request to /form.php
	    request = $.ajax({
	        url: ajaxurl,
	        type: "post",
	        data: ajaxdata
	    });

	    // callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	    	jQuery("#error-message").html(response);
	        // log a message to the console
	        console.log("Hooray, it worked!");
	    });
	 
	    // callback handler that will be called on failure
	    request.fail(function (jqXHR, textStatus, errorThrown){
	        // log the error to the console
	        console.error(
	            "The following error occured: "+
	            textStatus, errorThrown
	        );
	    });
	 
	    // callback handler that will be called regardless
	    // if the request failed or succeeded
	    request.always(function () {
	        // reenable the inputs
	        $inputs.prop("disabled", false);
	    });
	 
	    // prevent default posting of form
	    event.preventDefault();
	});

});