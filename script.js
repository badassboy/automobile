
$(document).ready(function(){

	$("#comment-section").click(function(){
			$("#comment-two").show().addClass("share");

		})
	});

// enable tooltip everywhere
	$(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});


	// ajax handling for membership form
	 $(document).ready(function(){

	     $("#myForm").submit(function(e){
	       e.preventDefault();
	       $.ajax({
	         type:"post",
	         url:"postsajax.php",
	         data:$("#myForm").serialize()
	       })

	       .done(function(data){
	         $('#ad-seen').html(data);
	         // console.log("hello");
	         $('#user-ad').val(" ");
	       })

	       .fail(function(data){
	         // $('#message').html(data);
	         console.log("ajax failed to fire");
	       });

	      // $("#membership_form").find('input').val(" ");
	         
	     });

	 });


	 // $('#shareBtn').on('click',function(event){

		// var form = $('#myForm').serialize();
	 // 	var url = $('#myForm').attr('action');


	 // 	if (checked == 'true') {
	 // 		// ajax form submission
	 // 		$.ajax({
	 // 			type : "POST",
	 // 			url : url,
	 // 			data : form

	 // 		})
	 // 		// using the done promise callback
	 // 		.done(function(data){
	 // 			// console.log(data);
	 // 			// console.log("success");
	 // 			// autopopulate div
	 // 			// $('#ad-seen').text($('#user-ad').val());
	 // 			$('#ad-seen').html(data);

	 // 			// retrieve the DOM element matched by the jQuery object
	 // 			$('#myForm').get(0).reset();
	 // 			$('#user-ad').val(" ");


	 // 		})

	 // 		.fail(function(data){
	 // 			console.log(data);
	 // 			console.log("failed");
	 // 		})

	 // 		// stop form from submitting the normal way
	 // 		// and page refreshing
	 // 		event.preventDefault();
	 		
	 // 	}

	 // });


		// comment system
		$('#comment_button').on('click',function(event){

			event.preventDefault();

			var postedPostId = $(this).closest('#comment-form').find(':input[name="postid"]').val();

			if (postedPostId.value == 0) {
				return false;
			}
			

			

			var post_comment = document.getElementById("post_comment").value;
			if (post_comment == "") {
				alert("field required");
			}else {
				$.ajax({
					type:'post',
					url : 'index.php',
					data : {
						user_comm : post_comment,
						postid : postedPostId

					},
					success:function(data){
						console.log("able to comment");
						$('#single-comment').html($('#post_comment').val());
						$('#comment-form').get(0).reset();
						
					},
					error:function(data){
						console.log("error occured");
					}

				}) //end of ajax request

			} //end of else statement

		})

		


		
		// like system
		$('#like_button').on('click',function(event){

			event.preventDefault();

			// when the use clicks on like
				var postid = $(this).data('id');
				$post = $(this);
				$.ajax({
					url : 'index.php',
					type : 'post',
					data : {
						'liked' : 1,
						'user_id' : postid
					},
					success : function(response){
						console.log("liked post");
						$post.parent().find('span.likes_count').text(response + "likes");
						$post.addClass('hide');
						$post.siblings().removeClass('hide');

					}
					
				})



		})
		
		



