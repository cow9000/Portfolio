$(document).ready(function(){
								
					$(".selector").change(function() {
					
					    $value = $(this).val();
					
					    $(".item_name").val($value);
					
					
					});


			function desc($desc,$price){
				$(".desc").html($desc);
				$(".price").html($price);
			}

			$('.selector').change(function() {
			    arr = $(".selector").find(":selected").data('id').split('||||||');
			    $desc = arr[0];
			    $price = arr[1];
			    $(".desc").html("<p style='word-break: break-all;'>Description - " + $desc + "</p>");
			    $(".price").html("Price - $" + $price);
			}); 
			
			$(".coupon").change(function(){
			    	arr = $(".selector").find(":selected").data('id').split('||||||');
			    	$i = arr[2];
			    	$getCoupon = $(".coupon").val();
				$.get("coupons.php?coupon=" + $getCoupon + "&name=" + $(".selector").val() + "&click=true", function(data, status){
				if(data != "false"){
					$("#coupon").val(data).change();
					
					
					$value = parseInt(arr[1]) - parseInt(arr[1]) * parseFloat($("#coupon").val());
					if(!isNaN($value)){
					$get = $("input[name=option_amount" + $i +"]").val(($value.toFixed(2)).toString());
					$(".price").html("Price - $" + $("input[name=option_amount" + $i +"]").val());
					}
				}
				});

			});
			$('#referbutton').click(function() {
			
			    	$getCoupon = $(".coupon").val();
				$.get("coupons.php?coupon=" + $getCoupon + "&name=" + $(".selector").val() + "&click=true", function(data, status){
				if(data != "false"){
					$("#coupon").val(data).change();
					if($("#coupon").val() == "1.0"){
						window.location.href = "../bought";
					}
					
					$value = parseInt(arr[1]) - parseInt(arr[1]) * parseFloat($("#coupon").val());
					if(!isNaN($value)){
					$get = $("input[name=option_amount" + $i +"]").val(($value.toFixed(2)).toString());
					$(".price").html("Price - $" + $("input[name=option_amount" + $i +"]").val());
					}
				}
			    $getVar = $("#custom").val();
			    $("#custom").val($getVar + "|" + $("#refer").val()).change();
			    arr = $(".selector").find(":selected").data('id').split('||||||');
			    $price = arr[2];
			    if($("#refer").val().length > 5){
			    $get = $("input[name=option_amount" + $i +"]").val((parseInt(arr[1]) -  (parseInt(arr[1]) * .3)).toFixed(2));
			    }
				});
				
			}); 
			
			$(".item6").css("top","33px");
			$(".item6").css("left","-3px");
			
			$("body").click(function(){
			  $("#prompt").css("display","none");
			  $("#prompt2").css("display","none");
			});
			$("#prompt").click(function(e){
			  e.stopPropagation();
			});
			$("#prompt2").click(function(e){
			  e.stopPropagation();
			});
			$("#createImg").click(function(e){
			  e.stopPropagation();
			});
			$("#createVid").click(function(e){
			  e.stopPropagation();
			});
			function bold() {
				if (window.getSelection) {
					var sel = window.getSelection();
					if (sel.getRangeAt && sel.rangeCount) {
						range = sel.getRangeAt(0);
					}
				}
				if (typeof window.getSelection != "undefined") {
					var sel2 = window.getSelection();
					if (sel2.rangeCount) {
						var container = document.createElement("div");
						for (var i = 0, len = sel2.rangeCount; i < len; ++i) {
							container.appendChild(sel2.getRangeAt(i).cloneContents());
						}
						html = container.innerHTML;
					}
				} 
							
				var node = document.createElement("span");
				document.execCommand('bold');
				
				var space = document.createElement("span");
				space.innerHTML = "\u200B";

				range.insertNode(space);
				range.insertNode(node);
			}
			function italic() {
				if (window.getSelection) {
					var sel = window.getSelection();
					if (sel.getRangeAt && sel.rangeCount) {
						range = sel.getRangeAt(0);
					}
				}
				if (typeof window.getSelection != "undefined") {
					var sel2 = window.getSelection();
					if (sel2.rangeCount) {
						var container = document.createElement("div");
						for (var i = 0, len = sel2.rangeCount; i < len; ++i) {
							container.appendChild(sel2.getRangeAt(i).cloneContents());
						}
						html = container.innerHTML;
					}
				} 
							

				var node = document.createElement("span");
				document.execCommand('italic');
				var space = document.createElement("span");
				space.innerHTML = "\u200B";

				range.insertNode(space);
				range.insertNode(node);
			}
			
			function left() {
				if (window.getSelection) {
					var sel = window.getSelection();
					if (sel.getRangeAt && sel.rangeCount) {
						range = sel.getRangeAt(0);
					}
				}
				if (typeof window.getSelection != "undefined") {
					var sel2 = window.getSelection();
					if (sel2.rangeCount) {
						var container = document.createElement("div");
						for (var i = 0, len = sel2.rangeCount; i < len; ++i) {
							container.appendChild(sel2.getRangeAt(i).cloneContents());
						}
						html = container.innerHTML;
					}
				} 
							

				var node = document.createElement("span");
				$(node).css("float","left");
				node.innerHTML = html;
				range.deleteContents();
				var space = document.createElement("span");
				space.innerHTML = "\u200B";

				range.insertNode(space);
				range.insertNode(node);
			}
			function center() {
				if (window.getSelection) {
					var sel = window.getSelection();
					if (sel.getRangeAt && sel.rangeCount) {
						range = sel.getRangeAt(0);
					}
				}
				if (typeof window.getSelection != "undefined") {
					var sel2 = window.getSelection();
					if (sel2.rangeCount) {
						var container = document.createElement("div");
						for (var i = 0, len = sel2.rangeCount; i < len; ++i) {
							container.appendChild(sel2.getRangeAt(i).cloneContents());
						}
						html = container.innerHTML;
					}
				} 
							
				var node = document.createElement("div");
				$(node).css("display","block-inline");
				$(node).css("margin","0px auto");
				$(node).css("text-align","center");
				node.innerHTML = html;
				range.deleteContents();
				var space = document.createElement("span");
				space.innerHTML = "\u200B";

				range.insertNode(space);
				range.insertNode(node);
			}
			function right() {
				if (window.getSelection) {
					var sel = window.getSelection();
					if (sel.getRangeAt && sel.rangeCount) {
						range = sel.getRangeAt(0);
					}
				}
				if (typeof window.getSelection != "undefined") {
					var sel2 = window.getSelection();
					if (sel2.rangeCount) {
						var container = document.createElement("div");
						for (var i = 0, len = sel2.rangeCount; i < len; ++i) {
							container.appendChild(sel2.getRangeAt(i).cloneContents());
						}
						html = container.innerHTML;
					}
				} 
				var node = document.createElement("span");
				$(node).css("float","right");
				node.innerHTML = html
				var a = document.createElement("div");
				$(a).addClass("cf")
				range.deleteContents();
				var space = document.createElement("span");
				space.innerHTML = "\u200B";
				range.insertNode(a);
				range.insertNode(space);
				range.insertNode(node);
			}
			function image(src,width,height,alt) {
				if (window.getSelection) {
					var sel = window.getSelection();
					if (sel.getRangeAt && sel.rangeCount) {
						range = sel.getRangeAt(0);
					}
				}
				
				var img = $('<img>',
							 { id: 'imageBlock',
							   src: src, 
							   alt:alt,
							   width: width,
							   height: height,
							   display: "block"})
							   
							  .appendTo($('#div-textarea'));
							  $(img).css("display","block-inline");
			}
			function vid(src,width,height) {
				if (window.getSelection) {
					var sel = window.getSelection();
					if (sel.getRangeAt && sel.rangeCount) {
						range = sel.getRangeAt(0);
					}
				}
				$("#div-textarea").append("<iframe title='YouTube video player' class='youtube-player' type='text/html' width='" + width + "' height='" + height + "' src='https://www.youtube.com/embed/" + src + "' frameborder='0' allowFullScreen></iframe>")
			}
			function text(f){
				if (window.getSelection) {
					var sel = window.getSelection();
					if (sel.getRangeAt && sel.rangeCount) {
						range = sel.getRangeAt(0);
					}
				}
				if (typeof window.getSelection != "undefined") {
					var sel2 = window.getSelection();
					if (sel2.rangeCount) {
						var container = document.createElement("div");
						for (var i = 0, len = sel2.rangeCount; i < len; ++i) {
							container.appendChild(sel2.getRangeAt(i).cloneContents());
						}
						html = container.innerHTML;
					}
				} 
							

				var node = document.createElement("span");
				$(node).css("font-family",f);
				node.innerHTML = html;
				range.deleteContents();
				var space = document.createElement("span");
				space.innerHTML = "\u200B";

				range.insertNode(space);
				range.insertNode(node);
			}
			
				$('#bold').click( function() {
					var mytext = bold();
				});
				
				$('#italic').click(function(){
					var mytext = italic();
				});
				$('#left').click(function(){
					var mytext = left();
				});
				$('#right').click(function(){
					var mytext = right();
				});
				$('#center').click(function(){
					var mytext = center();
				});
				$(".text").live('change',function(){
					var mytext = text($(this).val());
				});
				$i = 0;
				$i2 = 0;
				$('#createImg').click(function(){
					if($i == 0){
					$("#prompt").css("display","block");
					$("#prompt2").css("display","none");
						$i = 1;
						$i2 = 0;
					}else{
						$i2 = 0;
						$i = 0;
						$("#prompt2").css("display","none");
						$("#prompt").css("display","none");
					}
				});
				$('#createVid').click(function(){
					if($i2 == 0){
					$("#prompt2").css("display","block");
					$("#prompt").css("display","none");
						$i2 = 1;
						$i = 0;
					}else{
						$i = 0;
						$i2 = 0;
						$("#prompt").css("display","none");
						$("#prompt2").css("display","none");
					}
				});
				$("#img").click(function(){
					var src = $("#imgText").val();
					var width = $("#imgWidth").val();
					var height = $("#imgHeight").val();
					var alt = $("#imgAlt").val();
					$("#imgText").innerHTML = "";
					image(src,width,height,alt);
					$("#imgText").val('');
					$("#imgWidth").val('');
					$("#imgHeight").val('');
					$("#imgAlt").val('');
				});
				$("#vid").click(function(){
					var src = $("#vidText").val();
					var width = $("#vidWidth").val();
					var height = $("#vidHeight").val();
					$("#vidText").innerHTML = "";
					vid(src,width,height);
					$("#vidText").val('');
					$("#vidWidth").val('');
					$("#vidHeight").val('');
				});
				
		
			function changeText(){
				var data = $("#div-textarea").html();
				$('textarea#BlogText').val(data);
			}
			
			$(".postBlog").mouseenter(function(){
				$data = $("#div-textarea").html();
				$('textarea#BlogText').val($data);
			});
			document.addEventListener("paste", function(e) {
			    e.preventDefault();
			
			    if (e.clipboardData) {
			        content = (e.originalEvent || e).clipboardData.getData('text/plain');
			
			        document.execCommand('insertText', false, content);
			    }
			    else if (window.clipboardData) {
			        content = window.clipboardData.getData('Text');
			
			        document.selection.createRange().pasteHTML(content);
			    }   
			});	
			$('div[contenteditable]').keydown(function(e) {
				// trap the return key being pressed
				if (e.keyCode === 13) {
				  // insert 2 br tags (if only one br tag is inserted the cursor won't go to the next line)
				  document.execCommand('insertHTML', false, '<br><br>');
				  // prevent the default behaviour of return key pressed
				  return false;
				}
			  });
		
			var pW = 0; // 0 is for not selected
			var kW = 0; // 0 is for not selected
			
			//Checks if ?selection=1 is on the url 
				$(".parentWebsites").css("height","1250px");
				$(".kidWebsites").css("height","1100px");
			});