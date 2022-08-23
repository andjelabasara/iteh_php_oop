function deletePhone( deleteid){//1
    $.ajax({
        url: 'handler/delete.php',
        type: 'post',
        data: { deletesend: deleteid  },
        
        success: function(data, status){
            location.reload(true);
            alert("Uspesno obrisano!");
        }
    });
}


function getDetailsUpdateModal(updateid){
    $('#hiddenData').val(updateid);  //postavljamo vrednost skrivenog polja da bude id od telefona koji treba da azuriramo 

    $.post("handler/get.php",{updateid:updateid},function(data,status){
        console.log(status);
        console.log(updateid);
        console.log(data);
        var phone=JSON.parse(data);//uzimamo podatke i parsisamo ih u JSON
        console.log(phone);        //uzimamo podatke iz baze i cuvamo ih u input field
        console.log(phone.model);
        $('#modelupdate').val(phone.model);
        $('#descriptionupdate').val(phone.description);
        $('#priceupdate').val(phone.price);

    }); 
}

$('#updateform').submit(function () {
 
    event.preventDefault();

    const $form =  $(this);
 
    const $inputs = $form.find('input, select, button, textarea');
 
    const serializedData = $form.serialize();
 
    $inputs.prop('disabled', true);

 
    request = $.ajax({
        url: 'handler/update.php',
        type: 'post',
        data: serializedData
    })

    request.done(function (response, textStatus, jqXHR) {
 
        $('#updateModal').modal('hide');
        location.reload(true);
        $('#updateform').reset;

    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('The following error occurred: ' + textStatus, errorThrown);
    });



});



$('#addform').submit(function () {
 
    event.preventDefault();  
    
    const $form = $(this);
 
    const $input = $form.find('input,select,button,textarea');
 
    const serijalizacija = $form.serialize();  
    console.log(serijalizacija); 

    $input.prop('disabled', true);   


    request = $.ajax({  
        url: 'handler/add.php',  
        type: 'post',
        data: serijalizacija
    });

    request.done(function (response, textStatus, jqXHR) {
        
 
            alert("Telefon dodat ");
            console.log("Uspesno dodavanje");
            location.reload(true);
        
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Greska: ' + textStatus, errorThrown);
    });
});
