
//window.alert("CAME");
/****************************************************************************************************************
The below function is used to create a modal when we press the delete button to delete a donor entry.
This is using SweetAlert plugin to create a user friendly modal!
********************************************************************************************************* */
function loadData(){

!function (t) {
	"use strict";
	var n = function () {};
	n.prototype.init = function () {
		 t(".delete-donor").click(function () {
			 var donor_id = $(this).attr('data-donor-id');
             //window.alert("TESTING");

			 swal({
				 title: "Are you sure, you wanna delete this donor entry?",
				 text: "You won't be able to revert this!",
				 type: "warning",
				 showCancelButton: !0,
				 confirmButtonClass: "btn btn-confirm mt-2",
				 cancelButtonClass: "btn btn-cancel ml-2 mt-2",
				 confirmButtonText: "Yes, delete it!"
			 }).then(function () {
				 $.ajax({
					 type: 'POST',
					 url: 'includes/donors/delete-donor.php',
					 data: 'donor_id= '+donor_id
				 
                 }).done(function (response) {
                    
                     window.alert(response);    
					 swal({
						 title: "Deleted !",
						 text: "Donor has been deleted!",
						 type: "success",
						 confirmButtonClass: "btn btn-confirm mt-2"
					 }).then(function(){
                         text: "DELETE SUCCESS"
						 self.location = "donors.php";
					 })
				 }).fail(function () {
						 swal({
							 title: "Issue !",
							 text: "There was issue deleteing donor, please try again later!",
							 type: "error",
							 confirmButtonClass: "btn btn-confirm mt-2"
						 })
					 })
			 })
		 })
	}, t.SweetAlert = new n, t.SweetAlert.Constructor = n
}(window.jQuery),
	function (t) {
		"use strict";
		t.SweetAlert.init()
	}(window.jQuery);
}
loadData();      /*CALL TO THE FUNC*/
