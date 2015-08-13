var maina;
$(function () {
$('#modalbutton').click(function() {
  $('#modal').modal('show')
     .find('#modalcontent')
		.load($(this).attr('value'));
});


     

});

$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    console.log("afterInsert");
});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});



//service center

$(".dynamicform1_wrapper").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform1_wrapper").on("afterInsert", function(e, item) {
    console.log("afterInsert");
});

$(".dynamicform1_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform1_wrapper").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform1_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});

 $('#amount_value_id').keyup(function(){
                var amountSum=0;
                $('#amount_value_id').each(function(){
                    if (this.value != "")
                        amountSum+=parseInt(this.value);
                });
                // alert('foo');
                $("#totalamount").text(amountSum);
                //console.log(amountSum);

            });


$('#replyform-price').keyup(function(){         
 var amountSum=0;
 amountSum+=parseInt(this.value);
 $("#totalamount").val(amountSum);
 });
 
 $('#replyform-roadt').keyup(function(){         
  var amountSum=0;
  amountSum+=parseInt(this.value);
  var am=
  $("#totalamount").val(amountSum);
  });
  

  
  
  
  
 /* $(".test").click(function(){
  alert("test");
  
      var clickedID = this.id;
      var res = clickedID.split("-");
      var test=res[0]+"-"+res[1]+"-"+"price";
    
      document.getElementById(test).disabled = true;
     
  });*/
  
  
  
  $( ".dynamicform_wrapper " ).on( "click" ,".test", function(e, item) {
  var clickedID = this.id;
    var res = clickedID.split("-");
    var test=res[0]+"-"+res[1]+"-"+"price";
    
     
     if(document.getElementById(test).disabled)
     {
       	document.getElementById(test).disabled = false;
     
     }
     else {
     
          document.getElementById(test).value = 0;
     
     
     	document.getElementById(test).disabled = true;
     }
     
     
  
    //alert("vaibhav");
  });
  
  $( ".comp" ).on( "click", function(e, item) {
  
  if(document.getElementById("replyform-roadt").disabled)
  {
    	document.getElementById("replyform-roadt").disabled = false;
  
  }
  else {
  
       document.getElementById("replyform-roadt").value = 0;
  
  
  	document.getElementById("replyform-roadt").disabled = true;
  }

  });
  
   $( ".comp1" ).on( "click", function(e, item) {
  
  if(document.getElementById("replyform-handc").disabled)
  {
    	document.getElementById("replyform-handc").disabled = false;
  
  }
  else {
    	document.getElementById("replyform-handc").value = 0;
  
  	document.getElementById("replyform-handc").disabled = true;
  }
    
      
      //alert("vaibhav");
    });
    
    $( ".comp2" ).on( "click", function(e, item) {
    
    if(document.getElementById("replyform-compin").disabled)
    {
      	document.getElementById("replyform-compin").disabled = false;
    
    }
    else {
        	document.getElementById("replyform-compin").value = 0;
    
    	document.getElementById("replyform-compin").disabled = true;
    }
    
      
        
        //alert("vaibhav");
      });
      
      $( ".comp3" ).on( "click", function(e, item) {
      
      
      if(document.getElementById("replyform-cashd").disabled)
      {
        	document.getElementById("replyform-cashd").disabled = false;
      
      }
      else {
      
      document.getElementById("replyform-cashd").value = 0;
      
      	document.getElementById("replyform-cashd").disabled = true;
      }
      
        
          
          //alert("vaibhav");
        });
        
        $( ".comp4" ).on( "click", function(e, item) {
        
        if(document.getElementById("replyform-cashs").disabled)
        {
          	document.getElementById("replyform-cashs").disabled = false;
        
        }
        else {
           document.getElementById("replyform-cashs").value = 0;
        
        	 document.getElementById("replyform-cashs").disabled = true;
        }
        
          });
          
          $( ".comp5" ).on( "click", function(e, item) {
          
          if(document.getElementById("replyform-roads").disabled)
          {
            	document.getElementById("replyform-roads").disabled = false;
          
          }
          else {
             document.getElementById("replyform-roads").value = 0;
          
          	 document.getElementById("replyform-roads").disabled = true;
          }
          
            });
            
            $( ".comp6" ).on( "click", function(e, item) {
            
            if(document.getElementById("replyform-regis").disabled)
            {
              	document.getElementById("replyform-regis").disabled = false;
            
            }
            else {
               document.getElementById("replyform-regis").value = 0;
            
            	 document.getElementById("replyform-regis").disabled = true;
            }
            
              });
    
    /*$( ".dynamicform_wrapper " ).on( "keyup" ,".price", function(e, item) {
    
    var amountSum=0;
    var val1=parseInt($("#replyform-price").val());
    var val2=parseInt($("#replyform-roadt").val());
    var val3=parseInt($("#replyform-handc").val());
    
    var clickedID = this.id;
    var res = clickedID.split("-");
    var test=res[0]+"-"+res[1]+"-"+"price";
    var value=parseInt($("#"+test).val());
    
    
    if(isNaN(val1))
    {
    
    amountSum+=0;
    }
    else {
        	amountSum+=val1;
    }
    
    if(isNaN(val2))
    {
    amountSum+=0;
    }
    else {
    	amountSum+=val2;
    }
    
    if(isNaN(val3))
    {
    amountSum+=0;
    }
    else {
    	amountSum+=val3;
    }
    
    if(isNaN(value))
    {
    amountSum+=0;
    }
    else {
    	amountSum+=value;
    }

    
    
    $(".mainprice").val(amountSum);
      
        
        //alert("vaibhav");
      });
      */
      
      $( ".dynamicform_wrapper " ).on( "keyup" ,".dprice", function(e, item) {
      var clickedID = this.id;
      var res = clickedID.split("-");
      var test=res[0]+"-"+res[1]+"-"+"price";
      
       
        var amount=0;
        var val=parseInt($("#"+test).val());
        console.log(val);
        
       // var amount=parseInt($(".mainprice").val());
        
        
        if(isNaN(val))
        {
        amount=0;
        }
        else {
        	amount+=val;
        	
        }
      
        
        	
        
       
        
        $(".mainprice").val(amount);

      });
      
      
     $( "#create" ).on( "click", function(e, item) {
     
     var amountSum=0;
     
     var val1=($("#replyform-price").val());
     var val2=($("#replyform-roadt").val());
     var val3=($("#replyform-handc").val());
     var val4=($("#replyform-compin").val());
     var val5=($("#replyform-cashd").val());
     var val6=($("#replyform-cashs").val());
     var val7=($("#replyform-regis").val());
     var val8=($("#replyform-roads").val());
     
     val1 = parseFloat(val1.replace (/,/g, ""));
     val2 = parseFloat(val2.replace (/,/g, ""));
     val3 = parseFloat(val3.replace (/,/g, ""));
     val4 = parseFloat(val4.replace (/,/g, ""));
     val5 = parseFloat(val5.replace (/,/g, ""));
     val6 = parseFloat(val6.replace (/,/g, ""));
     val7 = parseFloat(val7.replace (/,/g, ""));
     val8 = parseFloat(val8.replace (/,/g, ""));
     
     
     
     
     if(isNaN(val1))
     {
     
     amountSum+=0;
     }
     else {
         	amountSum+=val1;
     }
     
     if(isNaN(val2))
     {
     amountSum+=0;
     }
     else {
     	amountSum+=val2;
     }
     
     if(isNaN(val3))
     {
     amountSum+=0;
     }
     else {
     	amountSum+=val3;
     }
     
     if(isNaN(val4))
     {
     amountSum+=0;
     }
     else {
     	amountSum+=val4;
     }
     
     if(isNaN(val5))
     {
     amountSum+=0;
     }
     else {
     	amountSum-=val5;
     }
     
     if(isNaN(val6))
     {
     amountSum+=0;
     }
     else {
     	amountSum-=val6;
     }
     
     if(isNaN(val7))
     {
     amountSum+=0;
     }
     else {
     	amountSum+=val7;
     }
     
     if(isNaN(val8))
     {
     amountSum+=0;
     }
     else {
     	amountSum+=val8;
     }
     
     $('.price').each(function() {
     
     if(isNaN(parseFloat($(this).val())))
     {
     
     amountSum+=0;
     
     }
     else {
     
     var price=($(this).val());
     price = parseFloat(price.replace (/,/g, ""));
         	amountSum+=price;
     }
      /* rest of the code for each name retrieved */
     })
     
     
    amountSum = formatNumber(amountSum);

		$(".mainprice").val(amountSum);
		
     
       
         
         
       });
       
       
       $("#fox").click(function(event){
              event.preventDefault();
              $("img[id$='-captcha-image']").click();
            })
            
            $("#fox1").click(function(event){
            
                   event.preventDefault();
                   $("img[id$='-verifycode-image']").click();
                 })
                 
                 
                 
    
  /*  $("#w0").keydown(function(e){
    
   if(e.keyCode == 13){
   
  
   var url = "site/choose/?car="+$(this).val();
 
    window.location.href = url;
    
   
   
          //alert('you pressed enter ^_^');
      }
         });*/
         
     $(".btn-primarymain").click(function(event){
     
     var car=$("#carmain").val();
      var city=$("#sel1").val();
  
     
     if(! city)
     {
     
     if(!car)
     {
     }
     else {
     
     $.ajax({
         url: 'site/not/?email='+$("#carmain").val(),
         type: 'GET',
         contentType: "application/json; charset=utf-8",
         dataType: "json",
     });
     	
     }
   
     
    
     
     }
     
     else if(city == "Other"){
     
     $('html, body').animate({
            scrollTop: $("#sign").offset().top
        }, 2000);
        
     }
     else if (! car) {
     	
     	alert("Please choose your car.");
     }
     
     else {
     
     var flag=0;
   var myList;
   $.getJSON('http://localhost:8888/samples/car_main.json')
   .done(function (data) {
   myList = data;
   
   for(i=0;i<myList.length;i++)
   {
   if(myList[i]['value']==$("#carmain").val())
   {
   flag=1;
   break;
   }

   }
   
   if(flag)
   
   {
   
   var url = "site/choose/?car="+$("#carmain").val();
   
      window.location.href = url;
     
     
   }
   
   else {
   	alert("Sorry this car is not available.");
   	return false;
   	
   }
   
   
   
   
   
   });
   
   }
 
     
     
     })
        
        
        
     $(".btn-primarysign").click(function(event){
     
     var x=$("#email").val();
     
     if (x == null || x == "") {
         
             alert("Please enter a valid email address.");
             return false;
         }
         else {
         
         if (!isValidEmailAddress(x)) {
         alert("Please enter a valid email address.");
         return false;
         
     
             }
             
             }
             
        var city=$("#city").val();
        
        
           
           if(! city)
           {
        
           
           alert("Please enter the city.");
           
          
           
           }
           
           else {
           
           
           var url = "site/notify/?email="+$("#email").val()+"*"+$("#city").val();
           
              window.location.href = url;
           	
           }

     
     
     }) 
     
     
     $("#sel1").change(function(event){
     
   
    if (this.value == "Other")
    {
    
    event.preventDefault(); 
    
    
    
    $('html, body').animate({
           scrollTop: $("#sign").offset().top
       }, 2000);
       
      
     
    
  
  }
      
     
     })
     
     $('#replyform-brefund').on('change', function() {
       
       if(this.value =="No")
       {
       document.getElementById("replyform-bcancel").disabled = true; 
       
       }
       else {
       	document.getElementById("replyform-bcancel").disabled = false;
       }
        // or $(this).val()
     });
     
    
     
     
     
     function isValidEmailAddress(emailAddress) {
         var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
         return pattern.test(emailAddress);
     }
       
       
       function formatNumber (num) {
           return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
       }
                 
       
  
 
 
 
 