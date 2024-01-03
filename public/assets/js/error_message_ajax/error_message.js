const show_error_message = (status = 1000,message = '') => {
    status_message = {
        0: 'No conectado: Verifique la red.',
        404: 'No se encontró la página solicitada',
        500: 'Error de servidor interno.',
        401: 'No autorizado. Sesión expirada, inicie sesión',
        1000: (message != '')?`${message}`:'Upss, algo salio mal!!'
    };
    if (status === 0) {
        showNotify('Error:',status_message[0],'danger');
    } else if (status == 404) {
        showNotify('Error:',status_message[404],'danger');
    } else if (status == 500) {
        showNotify('Error:',status_message[500],'danger');
    }else if (status == 401) {
        showNotify('Error:',status_message[401],'danger');
    }else{
        showNotify('Error:',status_message[1000],'danger');
    }
}