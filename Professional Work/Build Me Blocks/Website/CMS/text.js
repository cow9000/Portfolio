$(document).ready(function(){
	//Editing 
	// 1 = Editing
	// 0 = Not
	editing = 0;


	//Sets up the working environment
	$('.geti').attr('contenteditable','true');
	$('.title').attr('contenteditable','true');
	
	//Adds the Settings for the container (color, size, ect)
	$(".geti").before("<div class='settings'><br><a href='javascript:;' class='remove' style='color:white;'>Remove container.</a><br><select class='size'><option value='12'>(1)Small to (12)big.</option><option value='12'>12</option><option value='11'>11</option><option value='10'>10</option><option value='9'>9</option><option value='8'>8</option><option value='7'>7</option><option value='6'>6</option><option value='5'>5</option><option value='4'>4</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option></select><br><select class='c'><option value='1'>Red</option><option value='2'>Orange</option><option value='3'>Blue</option></select><br><br></div>");
	
	//
	$(".geti").before("<div class='slots'><input class='list' type='button' value='&#xf0ca;'></input><input class='bold' type='button' value='&#xf032;'></input><input class='link' type='button' value='&#xf0c1;'></input><input class='image' type='button' value='&#xf03e;'></input><input class='italic' type='button' value='&#xf033;'></input><input class='left' type='button' value='&#xf036;'></input><input class='center' type='button' value='&#xf037;'></input><input class='right' type='button' value='&#xf038;'></input><li style='display:inline; list-style:none;'><select class='text'><option value=''>Change font</option><option style='font-family:Georgia, serif;' value='Georgia, serif'>Georgia</option><option style='font-family:Palatino, serif;' value='Palatino, serif'>Palatino</option><option style='font-family:Times, serif;' value='Times, serif'>Times</option><option style='font-family:Arial, Helvetica, sans-serif;' value='Arial, Helvetica, sans-serif'>Arial</option><option style='font-family:cursive, sans-serif;' value='cursive, sans-serif'>Comic sans</option><option style='font-family:Courier, monospace;' value='Courier, monospace'>Monospace</option></select><select class='f-size'><option value='1' style='font-size:28px;'>Change text size</option><option value='1' style='font-size:28px;'>Size 6</option><option value='2' style='font-size:26px;'>Size 5</option><option value='3' style='font-size:24px;'>Size 4</option><option value='4' style='font-size:22px;'>Size 3</option><option value='5' style='font-size:20px;'>Size 2</option><option value='6' style='font-size:16px;'>Size 1</option></select><select class='color'><option value='transparent'>Change font color</option><option value='white' style='width:160px; height:32px; display:block; background-color:white;'></option><option value='darkred' style='width:160px; height:32px; display:block; background-color:darkred;'></option><option value='red' style='width:160px; height:32px; display:block; background-color:red;'></option><option value='pink' style='width:160px; height:32px; display:block; background-color:pink;'></option><option value='yellow' style='width:160px; height:32px; display:block; background-color:yellow;'></option><option value='blue' style='width:160px; height:32px; display:block; background-color:blue;'></option><option value='aqua' style='width:160px; height:32px; display:block; background-color:aqua;'></option><option value='lighblue' style='width:160px; height:32px; display:block; background-color:lightblue;'></option></select></div>");
	$('#pageInfo').before("<a href='javascript:;' class='addContainer'>Add Container</a>");
		
		
		
		
		
			
			//THE FUNCTIONS FOR EDITING
			
			
			function bold() {
				document.execCommand('bold');
			}
			function italic() {
				document.execCommand('italic');
			}
			
			function left() {
				document.execCommand('justifyLeft',false,'');
			}
			function center() {
				document.execCommand('justifyCenter',false,'');
			}
			function right() {
				document.execCommand('justifyRight',false,'');
			}
			function text(f){
				document.execCommand('fontName',false,f);
			}

			function color(c){
				document.execCommand('foreColor',false,c);
			}
			function list(){
				document.execCommand('insertUnorderedList',false,'');
			}
			
			function size(c){
				    document.execCommand("fontSize", false, c);
				    var fontElements = document.getElementsByTagName("font");
				    for (var i = 0, len = fontElements.length; i < len; ++i) {
				        if (fontElements[i].size == "1") {
				            fontElements[i].removeAttribute("size");
				            fontElements[i].style.fontSize = "28px";
				        }else if(fontElements[i].size == "2") {
				            fontElements[i].removeAttribute("size");
				            fontElements[i].style.fontSize = "26px";
				        }else if(fontElements[i].size == "3") {
				            fontElements[i].removeAttribute("size");
				            fontElements[i].style.fontSize = "24px";
				        }else if(fontElements[i].size == "4") {
				            fontElements[i].removeAttribute("size");
				            fontElements[i].style.fontSize = "22px";
				        }else if(fontElements[i].size == "5") {
				            fontElements[i].removeAttribute("size");
				            fontElements[i].style.fontSize = "20px";
				        }else if(fontElements[i].size == "6") {
				            fontElements[i].removeAttribute("size");
				            fontElements[i].style.fontSize = "16px";
				        }
				        
				    }
			}
			function link(src,type){
				restoreSelection(selRange);
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
				var node = document.createElement("a");
				if(type=="button"){
					$(node).attr("class","link-1");
				}else{
					$(node).attr("class","link-4");
				}
				$(node).attr("href",src)
				node.innerHTML = html;
				selRange.deleteContents();
				var space = document.createElement("span");
				space.innerHTML = "\u200B";

				selRange.insertNode(space);
				selRange.insertNode(node);
			}
			function img(src,width,height){
				document.getElementsByClassName("geti")[0].focus();
				restoreSelection(selRange);
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
					var node = document.createElement("img");
					$(node).attr("src", src);
					$(node).attr("width",width);
					$(node).attr("height",height);
					node.innerHTML = html;
					selRange.deleteContents();
					var space = document.createElement("span");
					space.innerHTML = "\u200B";
					
					selRange.insertNode(space);
					selRange.insertNode(node);
			}
			
				function saveSelection() {
				    if (window.getSelection) {
				        sel = window.getSelection();
				        if (sel.getRangeAt && sel.rangeCount) {
				            return sel.getRangeAt(0);
				        }
				    } else if (document.selection && document.selection.createRange) {
				        return document.selection.createRange();
				    }
				    return null;
				}
				
				function restoreSelection(range) {
				    if (range) {
				        if (window.getSelection) {
				            sel = window.getSelection();
				            sel.removeAllRanges();
				            sel.addRange(range);
				        } else if (document.selection && range.select) {
				            range.select();
				        }
				    }
				}
				
				var selRange;
							
			
				//CHECKS THE CLICKS
				$('.bold').live('click', function(){
					var mytext = bold();
				});
				
				$('.italic').live('click', function(){
					var mytext = italic();
				});
				$('.left').live('click', function(){
					var mytext = left();
				});
				$('.right').live('click', function(){
					var mytext = right();
				});
				$('.center').live('click', function(){
					var mytext = center();
				});
				$(".list").live("click",function(){
					var mytext = list();
				});
				$(".text").live('change',function(){
					var mytext = text($(this).val());
					$(this).prop('selectedIndex',0);
				});
				$(".f-size").live('change',function(){
					var mytext = size($(this).val());
					$(this).prop('selectedIndex',0);
				});
				$(".color").live('change', function(){
					var mytext = color($(this).val());
					$(this).prop('selectedIndex',0);
				
				});
				$(".image").live('click', function(){
					selRange = saveSelection();
					var src = "";
					
					//Covers the page for the images and the center box for the images
					var page = "<div id='overview'><div id='centerBox'><div class='centered'><h3>Create a img</h3><input type='text' id='link' placeholder='Insert image url'></input><input id='width' placeholder='Width'></input><input id='height' placeholder='Height'></input><br><input type='submit' value='Create Image' id='createImage'></input><br><br><h3>Upload a image</h3><input type='file' id='file' name='uploadFile'><br><input type='submit' id='startupload' value='Upload image'><br><Br><h3>Files</h3><div class='files'>" + getimages() + "</div></div></div></div>";
					$("#getInfo").before(page);
					
					
					//image(src);
				});
				$(".link").live('click', function(){
					
					selRange = saveSelection();
					var page = "<div id='overview'><div id='centerBox'><div class='centered'><h3>Create a link</h3><input type='text' id='link' placeholder='Insert url'></input><br><select id='linkType'><option value='Button Type'>Button Type</option><option value='button'>Button</option><option value='link'>Link</option></select><br><input type='submit' value='Create Link' id='createlink'></input><br><br><h3>Upload a file</h3><input type='file' id='file' name='uploadFile'><br><input type='submit' id='startupload' value='Upload File'></input><br><Br><h3>Files</h3><div class='files'>" + getfiles() + "</div></div></div></div>";
					$("#getInfo").before(page);
					
					
					//link(src, type);
				});
				
				$("#createlink").live('click', function(){
					src = $("#link").val();
					type = $("#linkType").val();
					link(src,type);
					$("#overview").remove();
				});
				$("#createImage").live('click', function(){
					src = $("#link").val();
					width = $("#width").val();
					height = $("#height").val();
					img(src,width,height);
					$("#overview").remove();
				});
				
				
				//THIS IS FOR EASE OF EXITING OUT OF THE OVERVIEW.
				$("#overview").live('click', function(){
					
					$("#overview").remove();
				
				});
				//Stop event from happening
				$("#centerBox").live('click', function(e){
					e.stopPropagation();
				});
				
				
				
				
				//FOR UPLOADING FILES
				$('#startupload').live('click', function() {
				    var file_data = $('#file').prop('files')[0];
				    var form_data = new FormData();
				    form_data.append('file', file_data);
				    $.ajax({
				                url: 'upload.php', // point to server-side PHP script 
				                dataType: 'text',  // what to expect back from the PHP script, if anything
				                cache: false,
				                contentType: false,
				                processData: false,
				                data: form_data,                         
				                type: 'post',
				                success: function(php_script_response){
				                    $("#file").val("");
				                    alert(php_script_response); // display response from the PHP script, if any
				                    
				                }
				     });
				});
				
				//add url to the url textbox
				$(".clickme").live("click",function(){
					$("#link").val("../uploads/" + $(this).text().replace("Click me for url.",""));
					$("#link").css("background-color","#338C29")
				});
				$(".clickmeimg").live("click",function(){
					//Setting image width
					
					var tmpImg = new Image();
					tmpImg.src=$(this).attr('src');
					$(tmpImg).one('load',function(){
						var orgWidth = tmpImg.width;
						var orgHeight = tmpImg.height;
						$("#width").val(orgWidth);
						$("#height").val(orgHeight);
						$("#link").val($(this).attr('src'));
						$("#link").css("background-color","#338C29");
					});
				});
				
				
				//THIS IS FOR THE IMAGES POSTING. THIS GETS ALL IMAGES AND NOTHING ELSE.
				function getimages(){
				    var files = "";
				    $.ajax({
				                url: 'getFiles.php?image=true', // point to server-side PHP script 
				                dataType: 'text',  // what to expect back from the PHP script, if anything                        
				                type: 'get',
				                async: false,
				                success: function(text){
				                    files = text; // display response from the PHP script, if any
				                }
				     });
				     return files;
				}
				
				//GETS ALL FILES FOR LINK
				function getfiles(){
				    var files = "";
				    $.ajax({
				                url: 'getFiles.php', // point to server-side PHP script 
				                dataType: 'text',  // what to expect back from the PHP script, if anything                        
				                type: 'get',
				                async: false,
				                success: function(text){
				                    files = text; // display response from the PHP script, if any
				                }
				     });
				     return files;
				}
				
				
	
	$('div[contenteditable]').keydown(function(e) {
		// trap the return key being pressed
		if (e.keyCode === 13) {
			// insert 2 br tags (if only one br tag is inserted the cursor wont go to the next line)
			document.execCommand('insertHTML', false, '<br><br>');
			// prevent the default behaviour of return key pressed
			return false;
		}
	});
	
	$(".hover").hover(function(){
		$('.geti').attr('contenteditable','false');
		$(".slots").remove();
		$(".settings").remove();
		$(".title").attr('contenteditable','false')
		$value = $("#pageInfo").html();
		$title = $("#pageTitle").text();
		$(".pageText").val($value)
		$(".pageTitle").val($title);
	}, function(){
		$value = $("#pageInfo").html();
		$(".pageText").val($value);
		$(".pageTitle").val($title);
		$('.geti').attr('contenteditable','true');
		$('.title').attr('contenteditable','true');
		$(".geti").before("<div class='settings'><br><a href='javascript:;' class='remove' style='color:white;'>Remove container.</a><br><select class='size'><option value='(1)Small to (12)big.'>(1)Small to (12)big.</option><option value='12'>12</option><option value='11'>11</option><option value='10'>10</option><option value='9'>9</option><option value='8'>8</option><option value='7'>7</option><option value='6'>6</option><option value='5'>5</option><option value='4'>4</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option></select><br><br><select class='c'><option value='1'>Red</option><option value='2'>Orange</option><option value='3'>Blue</option></select><br><br></div>");
		
		
		$(".geti").before("<div class='slots'><input class='list' type='button' value='&#xf0ca;'></input><input class='bold' type='button' value='&#xf032;'></input><input class='link' type='button' value='&#xf0c1;'></input><input class='image' type='button' value='&#xf03e;'></input><input class='italic' type='button' value='&#xf033;'></input><input class='left' type='button' value='&#xf036;'></input><input class='center' type='button' value='&#xf037;'></input><input class='right' type='button' value='&#xf038;'></input><li style='display:inline; list-style:none;'><select class='text'><option style='font-family:Georgia, serif;' value='Georgia, serif'>Georgia</option><option style='font-family:Palatino, serif;' value='Palatino, serif'>Palatino</option><option style='font-family:Times, serif;' value='Times, serif'>Times</option><option style='font-family:Arial, Helvetica, sans-serif;' value='Arial, Helvetica, sans-serif'>Arial</option><option style='font-family:cursive, sans-serif;' value='cursive, sans-serif'>Comic sans</option><option style='font-family:Courier, monospace;' value='Courier, monospace'>Monospace</option></select><select class='f-size'><option value='1' style='font-size:28px;'>Change text size</option><option value='1' style='font-size:28px;'>Size 6</option><option value='2' style='font-size:26px;'>Size 5</option><option value='3' style='font-size:24px;'>Size 4</option><option value='4' style='font-size:22px;'>Size 3</option><option value='5' style='font-size:20px;'>Size 2</option><option value='6' style='font-size:16px;'>Size 1</option></select><select class='color'><option value='transparent'>Change font color</option><option value='white' style='width:160px; height:32px; display:block; background-color:white;'></option><option value='darkred' style='width:160px; height:32px; display:block; background-color:darkred;'></option><option value='red' style='width:160px; height:32px; display:block; background-color:red;'></option><option value='pink' style='width:160px; height:32px; display:block; background-color:pink;'></option><option value='yellow' style='width:160px; height:32px; display:block; background-color:yellow;'></option><option value='blue' style='width:160px; height:32px; display:block; background-color:blue;'></option><option value='aqua' style='width:160px; height:32px; display:block; background-color:aqua;'></option><option value='lighblue' style='width:160px; height:32px; display:block; background-color:lightblue;'></option></select></div>");
	});	
	
	//This is to make sure that when you copy and paste it is plain text.
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
	
	
	$(".size").live('change',function(){
		
		$(this).parents('.g').removeClass().addClass('grid_' + $(this).val() + " g");
	});
	
	$(".c").live('change',function(){
		
		$(this).parents('.color').removeClass().addClass('block type' + $(this).val() + " color");
	});
	$(".remove").live('click',function(e){
		e.preventDefault();
	        if (window.confirm("Do you want to delete this container?")) {
	            $(this).parents('.g').remove();
	        }
		
	});
	
	$(".addContainer").click(function(){
		$('.wrapper').append("<div class='grid_12 g'><div class='block type3 color'><div class='inner type2'><h3 id='bigT' class='title'>Title</h3><div class='settings'><br><a href='javascript:;' class='remove' style='color:white;'>Remove container.</a><br><select class='size'><option value='12'>(1)Small to (12)big.</option><option value='12'>12</option><option value='11'>11</option><option value='10'>10</option><option value='9'>9</option><option value='8'>8</option><option value='7'>7</option><option value='6'>6</option><option value='5'>5</option><option value='4'>4</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option></select><br><select class='c'><option value='1'>Red</option><option value='2'>Orange</option><option value='3'>Blue</option></select><br><br></div><div class='slots'><input class='list' type='button' value='&#xf0ca;'></input><input class='bold' type='button' value='&#xf032;'></input><input class='link' type='button' value='&#xf0c1;'></input><input class='image' type='button' value='&#xf03e;'></input><input class='italic' type='button' value='&#xf033;'></input><input class='left' type='button' value='&#xf036;'></input><input class='center' type='button' value='&#xf037;'></input><input class='right' type='button' value='&#xf038;'></input><li style='display:inline; list-style:none;'><select class='text'><option value=''>Change font</option><option style='font-family:Georgia, serif;' value='Georgia, serif'>Georgia</option><option style='font-family:Palatino, serif;' value='Palatino, serif'>Palatino</option><option style='font-family:Times, serif;' value='Times, serif'>Times</option><option style='font-family:Arial, Helvetica, sans-serif;' value='Arial, Helvetica, sans-serif'>Arial</option><option style='font-family:cursive, sans-serif;' value='cursive, sans-serif'>Comic sans</option><option style='font-family:Courier, monospace;' value='Courier, monospace'>Monospace</option></select><select class='f-size'><option value='1' style='font-size:28px;'>Change text size</option><option value='1' style='font-size:28px;'>Size 6</option><option value='2' style='font-size:26px;'>Size 5</option><option value='3' style='font-size:24px;'>Size 4</option><option value='4' style='font-size:22px;'>Size 3</option><option value='5' style='font-size:20px;'>Size 2</option><option value='6' style='font-size:16px;'>Size 1</option></select><select class='color'><option value='transparent'>Change font color</option><option value='white' style='width:160px; height:32px; display:block; background-color:white;'></option><option value='darkred' style='width:160px; height:32px; display:block; background-color:darkred;'></option><option value='red' style='width:160px; height:32px; display:block; background-color:red;'></option><option value='pink' style='width:160px; height:32px; display:block; background-color:pink;'></option><option value='yellow' style='width:160px; height:32px; display:block; background-color:yellow;'></option><option value='blue' style='width:160px; height:32px; display:block; background-color:blue;'></option><option value='aqua' style='width:160px; height:32px; display:block; background-color:aqua;'></option><option value='lighblue' style='width:160px; height:32px; display:block; background-color:lightblue;'></option></select></div><div class='geti' contenteditable='true'><p>:</p></div></div> </div></div>");
		$('.geti').attr('contenteditable','true');
		$('.title').attr('contenteditable','true');
	
	});

});