$(function(){

    var ms=new Array();
    var query={"clientid":$('#typeid option:selected').val()};
    $.get("materialList.php",query,function(iks)
    {


        var obj = JSON.parse(iks);
        var out="";
        //alert(obj);
        data=new Array();
        out=new Array();



        for(var i = 0; i < obj.ITEM.length; i++) {

            data[i]=new Array();

            data[i][0]=obj.ITEM[i].item;
            data[i][1]=obj.ITEM[i].name;
            data[i][2]=obj.ITEM[i].id;
            //alert(data[i][0]+" data");
       //     out[i]=obj.ITEM[i].item;
            ms.push(data[i][2]);


        }


    });

alert("");

  
  // setup autocomplete function pulling from currencies[] array
  $('#autocomplete').autocomplete({

    Source: ms

  });
  

});