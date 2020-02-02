$(document).ready(function(){
	//add teh rule here
	$.validator.addMethod("valueNotEquals", function(value, element, arg){
		return arg !== value;
	}, "Value must not equal arg.");
	//input validation
	$("#contact").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				maxlength:50
			},
			email:{
				required:true,
				email:true
			},
			subject:{
				required:true
			},
			massage:{
				required:true
			}
		},
		messages:{
				name:{
					required: "Please enter your name!",
					minlength: "Your name must should be at least 2 latter",
					maxlength: "Your name must should be maxium 50 latter"
				},
				email:{
					required: "Please enter email address!",
					email: "The email address not valid!"
				},
				subject:{
					required: "Please enter subject!"
				},
				massage:{
					required: "Please enter your message!"
				}
		}
	});
});
//for final massage
// $.validator.setDefaults({
// 	submitHandler:function(form){
// 		alert("submitted!");
// 	}
// });