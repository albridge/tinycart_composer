function getItems()
  {  
  	var item=$("#products").val();  

  	if(item.length>0){	
    $.post("getItems.php",       
   
    {      
        item:item
    },
    function(data, status){      
  
       $("#list").html(data);     

    });
	}else{
		$("#list").html('');
	}
}


// add items to cart
function addtocart(id)
  {    			
    $.post("addtocart.php",       
   
    {      
        id:id
    },
    function(data, status){    
       $("#cart").html(data);
       $("#list").html('');
       $("#products").val('');
       $("#products").focus();
       // document.getElementById("products").focus();
    });	
	
}



/* modifty cart item. action could be increase or reduce quantity 
or remove item from cart
1 is increase
2 is reduce
3 is remove from cart
*/

function modify(id,action)
  {     
    $.post("modify.php",       
   
    {      
        id:id,
        action:action
    },
    function(data, status){    
       $("#cart").html(data); 
       $("#products").focus();     
    });	
	
}

// 