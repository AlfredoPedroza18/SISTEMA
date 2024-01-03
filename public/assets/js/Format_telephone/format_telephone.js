const isNumericInput = (event) => {
	const key = event.keyCode;
	return ((key >= 48 && key <= 57) || // Allow number line
		(key >= 96 && key <= 105) // Allow number pad
	);
};

const isModifierKey = (event) => {
	const key = event.keyCode;
	return (event.shiftKey === true || key === 35 || key === 36) || // Allow Shift, Home, End
		(key === 8 || key === 9 || key === 13 || key === 46) || // Allow Backspace, Tab, Enter, Delete
		(key > 36 && key < 41) || // Allow left, up, right, down
		(
			// Allow Ctrl/Command + A,C,V,X,Z
			(event.ctrlKey === true || event.metaKey === true) &&
			(key === 65 || key === 67 || key === 86 || key === 88 || key === 90)
		)
};

const enforceFormat = (event) => {
	// La entrada debe tener un formato numérico válido o una tecla modificadora, y no debe tener más de diez dígitos
	if(!isNumericInput(event) && !isModifierKey(event)){
		event.preventDefault();
	}
};

const formatToPhone = (event) => {
	if(isModifierKey(event)) {return;}
	const target = event.target;
	//.replace(/\D/g,'')
	const input = event.target.value.replace(/[^a-z0-9s]/gi, '').substring(0,10); // reemplaza los caracteres no numericos
	const zip = input.substring(0,3);
	const middle = input.substring(3,6);
	const last = input.substring(6,10);

	if(input.length > 6){target.value = `${zip} - ${middle} - ${last}`;}
	else if(input.length > 3){target.value = `${zip} - ${middle}`;}
	else if(input.length > 0){target.value = `${zip}`;}
};
const format_telephone = (Name) =>{
    const inputElement = document.getElementsByName(`${Name}`);   
    const arrayTypeTitle=['Telefono',
						  'Teléfono',
                          'Teléfono fijo',
                          'Tel Oficina',
                          'Celular Jefe',
                          'Telefono Celular',
                          'Telefono de Casa',
                          'Celular'];
    const TypeTitle = arrayTypeTitle.filter(title => title == inputElement[0].dataset.titleinput);
    if (TypeTitle.length > 0){
        inputElement[0].addEventListener('keydown',enforceFormat);
        inputElement[0].addEventListener('keyup',formatToPhone);
    }

}
$('.phone_with_ddd').mask('000-000-0000');
$('#Telefono').mask('000-000-0000');
