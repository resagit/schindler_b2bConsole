    
/**
 * Provides suggestions for state names (USA).
 * @class
 * @scope public
 */
var states;
function StateSuggestions(client) {
    
    
  //  alert(client+"inn state sugest");
    
       if (window.XMLHttpRequest)
				{// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						
					
						var a=xmlhttp.responseText;
						//alert(a);
                        setMaterialList(a);
					}
				}
               // var x=document.getElementById('typeid').value ;
               // alert(client);
				query="?clientId="+client;
				xmlhttp.open("GET","materialList.php"+query,true);
				xmlhttp.send();
    var out;
    function setMaterialList(arr) 
     {
        // alert("in set material");
        
    var obj = JSON.parse(arr);
         //alert(obj);
         data=new Array();
         out=new Array();
             for(var i = 0; i < obj.ITEM.length; i++) {
	
	data[i]=new Array();
                 
							data[i][0]=obj.ITEM[i].item;
							data[i][1]=obj.ITEM[i].name;
                            data[i][2]=obj.ITEM[i].id;
             //alert(data[i][0]+" data");
                 out[i]=obj.ITEM[i].item;
             }
							
        // this.states =out;  
         bc(out);
	 }
    //alert(out+"OUT");
    
    
    function bc(arr)
    {
       // alert(arr);
         states =arr;
    }
    
    
    
}

/**
 * Request suggestions for the given autosuggest control. 
 * @scope protected
 * @param oAutoSuggestControl The autosuggest control to provide suggestions for.
 */
StateSuggestions.prototype.requestSuggestions = function (oAutoSuggestControl /*:AutoSuggestControl*/) {
    var aSuggestions = [];
    var sTextboxValue = oAutoSuggestControl.textbox.value;
    
    if (sTextboxValue.length > 0){
    
        //search for matching states
        for (var i=0; i < states.length; i++) { 
            if (states[i].indexOf(sTextboxValue) == 0) {
                aSuggestions.push(states[i]);
            } 
        }
    }

    //provide suggestions to the control
    oAutoSuggestControl.autosuggest(aSuggestions);
};