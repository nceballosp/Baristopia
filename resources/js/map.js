import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

export function initMap(elementId, lat = 4.5709, lng = -74.2973) {
    // Crear el mapa
    const map = L.map(elementId).setView([lat, lng], 13);

    // Agregar el tile layer de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Agregar un marcador
    L.marker([lat, lng]).addTo(map)
        .bindPopup('Ubicación actual')
        .openPopup();

    return map;
} 