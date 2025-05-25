function showInfo(marker, title, description) {
    const infoWindow = document.getElementById('infoWindow');
    const markerRect = marker.getBoundingClientRect();
    
    // Posicionar la ventana de información
    infoWindow.style.left = markerRect.left + 'px';
    infoWindow.style.top = (markerRect.top - 100) + 'px';
    
    // Actualizar contenido
    infoWindow.querySelector('h5').textContent = title;
    infoWindow.querySelector('p').textContent = description;
    
    // Mostrar/ocultar ventana
    if (infoWindow.style.display === 'block') {
        infoWindow.style.display = 'none';
    } else {
        infoWindow.style.display = 'block';
    }
}

// Cerrar ventana de información al hacer clic fuera
document.addEventListener('click', function(event) {
    const infoWindow = document.getElementById('infoWindow');
    const markers = document.querySelectorAll('.marker');
    
    if (!event.target.closest('.marker') && !event.target.closest('.info-window')) {
        infoWindow.style.display = 'none';
    }
}); 