
$('#createProject').submit(function(){
    event.preventDefault();
    console.log("Dodaj je pokrenuto");
    const $form = $(this);
    const $inputs = $form.find('input, select, button, textarea');
    const $serijalizacija = $form.serialize();
    console.log($serijalizacija);
    
    request = $.ajax({
        url:'handler/project/create.php',
        type:'post',
        data:$serijalizacija
    });
    location.reload(true);
    });

    
