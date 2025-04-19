<?php
// Database connection
require_once '../../../config/database.php';
$db = Database::getInstance();

// Fetch all dynamic content
$locations = $db->query("SELECT * FROM locations WHERE is_active = TRUE ORDER BY display_order")->fetchAll(PDO::FETCH_ASSOC);

// Convert locations to a more accessible format for JavaScript
$locations_js = [];
foreach ($locations as $loc) {
    $locations_js[$loc['id']] = [
        'images' => [
            $loc['image_path'],
            $loc['image_path2'],
            $loc['image_path3']
            // Add more images if needed
        ],
        // Include other data you might want to use
        'name' => $loc['name'],
        'title' => $loc['title'],
        'description' => $loc['description']
    ];
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- HEADER LINKS -->
<?php include("../../../layouts/header.php"); ?>
<!-- Add Leaflet CSS -->
<link rel="stylesheet" href="../../../assets/css/leaflet.css">

<body>
    <style>
        
    </style>
    <!-- Navbar -->
    <?php include("../../../layouts/navbar.php"); ?>
    <!-- End navbar -->

    <div class="hero-content2 text-white text-center vh-90">
        <!-- Video Background -->
        <div class="video-background2" style="border: solid 2p red;  height: 100%;">
            <div class="gallery-pic vh-100"
                style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../../../assets/image/where_to_invest.jpg) no-repeat center center; background-size:cover;">
            </div>
        </div>
        <div class="container-top">
            <h1 class="display-4">Where to invest in Ever Retreat</h1>
        </div>
    </div>

    <div class="new">

        <section class="about-section">
            <div class="x-cont">
                <div class="x-head-comb">
                    <div class="x-head" style="padding-top: 20px;">
                        <small>Our key locations</small>
                        <h1>Where to invest in Ever Retreat</h1>
                    </div>
    
                    <div class="intro-text" style=" text-align: justify; padding: 20px;">
                        <p>You can get involved by directly contributing to the development of these areas, partnering with
                            us to co-create sustainable tourism experiences.</p>
                    </div>
                </div>

                <div class="x-tabs">
                    <div class="tab active" data-location="kigali">Kigali City</div>
                    <div class="tab" data-location="rubavu">Rubavu</div>
                    <div class="tab" data-location="musanze">Musanze</div>
                    <div class="tab" data-location="nyungwe">Nyungwe</div>
                    <div class="tab" data-location="nyanza">Nyanza</div>
                    <div class="tab" data-location="huye">Huye</div>
                </div>

                <div class="map-x-cont">
                    <div class="map">
                        <div id="map"></div>
                    </div>

                    <div class="info-panel">
                        <h3 id="location-title">Kigali City</h3>
                        <p id="location-info">The vibrant capital city offers opportunities in urban tourism, business
                            travel accommodations, and cultural experiences. Kigali is known for its cleanliness,
                            safety, and growing business district.</p>
                        <p>You can get involved by directly contributing to the development of these areas, partnering
                            with us to co-develop unique lodging and activities.</p>

                        <div class="photos">
                            <h4>Photos from the location</h4>
                            <div class="photo-grid">
                                <img src="#" alt="Location photo 1">
                                <img src="#" alt="Location photo 2">
                                <img src="#" alt="Location photo 3">
                                <img src="#" alt="Location photo 4">
                            </div>
                            <!-- <div class="more-images">More Images &rarr;</div> -->
                        </div>

                        <!-- <button class="explore-btn">Explore Place</button> -->
                    </div>
                </div>
            </div>
        </section>
        <?php
        include("../../../layouts/footer.php");
        ?>
    </div>

    <!-- ADDING JAVASCRIPTS -->
    <?php include("../../../layouts/scripts.php"); ?>

    <!-- Add Leaflet JS -->
    <script src="../../../assets/js/leaflet.js"></script>
    <!-- Include Rwanda GeoJSON data -->
    <script src="../../../assets/js/rwanda.js"></script>

    <script>
        
        // Location information object
        const locationInfo = {
            kigali: {
                title: "Kigali City",
                description: "The vibrant capital city offers opportunities in urban tourism, business travel accommodations, and cultural experiences. Kigali is known for its cleanliness, safety, and growing business district.",
                coords: [-1.9546, 30.061],
                zoom: 12,
                images: ["/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100"]
            },
            rubavu: {
                title: "Rubavu",
                description: "Located on the shores of Lake Kivu, Rubavu (formerly Gisenyi) offers beach resorts, water sports, and stunning lake views. Investment opportunities include lakeside lodges and adventure tourism.",
                coords: [-1.68126, 29.32932],
                zoom: 13,
                images: ["/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100"]
            },
            musanze: {
                title: "Musanze",
                description: "Gateway to Volcanoes National Park and gorilla trekking, Musanze offers eco-tourism opportunities, luxury lodges, and adventure tourism facilities. The area is known for its mountain scenery.",
                coords: [-1.49984, 29.63497],
                zoom: 13,
                images: ["/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100"]
            },
            nyungwe: {
                title: "Nyungwe",
                description: "Home to Nyungwe Forest National Park, one of Africa's oldest rainforests. Opportunities include eco-lodges, canopy walkways, and guided forest experiences in this biodiversity hotspot.",
                coords: [-2.52794, 29.27838],
                zoom: 11,
                images: ["/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100"]
            },
            nyanza: {
                title: "Nyanza",
                description: "The former royal capital of Rwanda, Nyanza offers cultural tourism centered around the King's Palace Museum and traditional crafts. Investment opportunities in cultural experiences and heritage tourism.",
                coords: [-2.3580556, 29.7386111],
                zoom: 13,
                images: ["/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100"]
            },
            huye: {
                title: "Huye",
                description: "Formerly known as Butare, Huye is home to the National Museum of Rwanda and the National University. Opportunities exist in educational tourism and cultural preservation projects.",
                coords: [-2.5169444, 29.695833],
                zoom: 13,
                images: ["/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100"]
            }
        };

        // Wait for page to fully load
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the Leaflet map
            const map = L.map('map').setView([-1.9403, 29.8739], 8);
            
            // Add a more detailed and attractive basemap
            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                subdomains: 'abcd',
                maxZoom: 19
            }).addTo(map);
            updatePhotoGrid(1);
            
            // Define styling for provinces
            const provinceStyles = {
                default: {
                    color: "#3B729F",
                    weight: 2.5,
                    opacity: 0.8,
                    fillColor: "#88A4BC",
                    fillOpacity: 0.2,
                    dashArray: '3'
                },
                active: {
                    color: "#b08d4c",
                    weight: 3.5,
                    opacity: 1,
                    fillColor: "#b08d4c",
                    fillOpacity: 0.4,
                    dashArray: null
                },
                hover: {
                    weight: 3,
                    color: "#4682B4",
                    dashArray: '',
                    fillOpacity: 0.3
                }
            };
            
            // Define district styles for high visibility
            const districtStyle = {
                color: "#c90076", // Magenta for high visibility
                weight: 2.5,
                opacity: 0.9,
                fillColor: "#ff69b4",
                fillOpacity: 0.05,
                dashArray: '5,5' // Dashed line for clear distinction from provinces
            };
            
            const districtHighlightStyle = {
                color: "#ff1493", // Deep pink for highlight
                weight: 3,
                opacity: 1,
                fillColor: "#ff69b4",
                fillOpacity: 0.15,
                dashArray: null
            };
            
            // Create custom marker icons
            const customIcon = L.icon({
                iconUrl: 'https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/images/marker-icon.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowUrl: 'https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/images/marker-shadow.png',
                shadowSize: [41, 41]
            });
            
            // Create Golden Icon for active location
            const goldIcon = L.icon({
                iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-gold.png',
                iconSize: [28, 46], // Slightly larger
                iconAnchor: [14, 46],
                popupAnchor: [1, -34],
                shadowUrl: 'https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/images/marker-shadow.png',
                shadowSize: [41, 41]
            });
            
            // Initialize markers
            const markers = {};
            
            // Create markers for each location
            for (const location in locationInfo) {
                const info = locationInfo[location];
                const marker = L.marker(info.coords, {
                    icon: customIcon,
                    title: info.title
                }).addTo(map);
                
                // Add enhanced popup
                marker.bindPopup(`
                    <div>
                        <h3 style="color:#b08d4c;font-weight:600;margin-bottom:8px;font-size:16px;">${info.title}</h3>
                        <p>${info.description.substring(0, 100)}...</p>
                        <button class="view-details-btn" style="background-color:#b08d4c;color:white;border:none;padding:6px 12px;border-radius:4px;margin-top:8px;cursor:pointer;font-size:12px;" data-loc="${location}" onclick="updateInfoPanel('${location}')">View Details</button>
                    </div>
                `, {
                    className: 'custom-popup'
                });
                
                // Store marker for later reference
                markers[location] = marker;
                
                // Add click event
                marker.on('click', function() {
                    updateInfoPanel(location);
                });
            }
            
            // Storage for province and district layers
            const provinceLayers = {};
            const districtLayers = {};
            
            // Process Rwanda GeoJSON data
            if (anychart && anychart.maps && anychart.maps.rwanda) {
                const rwandaMapData = anychart.maps.rwanda;
                
                // Create a mapping of province IDs to their province names in our system
                const provinceMapping = {
                    "RW.3354": "kigali",   // Kigali City
                    "RW.3353": "northern", // Northern Province (contains Musanze)
                    "RW.3352": "eastern",  // Eastern Province
                    "RW.3351": "western",  // Western Province (contains Rubavu)
                    "RW.3350": "southern"  // Southern Province (contains Nyanza, Huye, Nyungwe)
                };
                
                // Convert UTM coordinates to WGS84 (latitude/longitude)
                // This is a simplified approach - for production, use a proper conversion library
                function convertCoordinates(coordinates) {
                    return coordinates.map(ring => {
                        return ring.map(point => {
                            // This is a simplified approximation
                            const x = point[0];
                            const y = point[1];
                            
                            // Rough conversion from UTM to lat/long for Rwanda
                            // These values are approximations for display purposes
                            const lon = ((x - 830000) / 85000) + 29.5;
                            const lat = ((y - 9790000) / 110000) - 2;
                            
                            return [lat, lon];
                        });
                    });
                }
                
                // Process each province
                rwandaMapData.features.forEach(feature => {
                    if (feature.geometry && feature.geometry.type === "Polygon" && feature.properties.id) {
                        // Create a new feature with converted coordinates
                        const newFeature = {
                            type: "Feature",
                            properties: {
                                name: feature.properties.name,
                                region: provinceMapping[feature.properties.id] || "",
                                id: feature.properties.id
                            },
                            geometry: {
                                type: "Polygon",
                                coordinates: convertCoordinates(feature.geometry.coordinates)
                            }
                        };
                        
                        // Add province to map
                        const provinceLayer = L.geoJSON(newFeature, {
                            style: provinceStyles.default,
                            onEachFeature: function(feature, layer) {
                                // Add province name as tooltip
                                layer.bindTooltip(feature.properties.name, {
                                    permanent: false,
                                    direction: 'center',
                                    className: 'province-tooltip'
                                });
                                
                                // Store reference to layer
                                if (feature.properties.region) {
                                    provinceLayers[feature.properties.region] = layer;
                                }
                                
                                // Add click event
                                layer.on('click', function() {
                                    if (feature.properties.region) {
                                        // For regions like "northern" where we want to show a specific city
                                        let targetLocation = feature.properties.region;
                                        
                                        // Map region to city for special cases
                                        if (targetLocation === "northern") targetLocation = "musanze";
                                        if (targetLocation === "western") targetLocation = "rubavu";
                                        if (targetLocation === "southern") targetLocation = "nyanza";
                                        
                                        updateInfoPanel(targetLocation);
                                    }
                                });
                                
                                // Highlight on hover
                                layer.on('mouseover', function() {
                                    layer.setStyle(provinceStyles.hover);
                                    layer.bringToFront();
                                });
                                
                                // Reset highlight on mouseout
                                layer.on('mouseout', function() {
                                    const activeLocation = document.querySelector('.tab.active').getAttribute('data-location');
                                    let targetLocation = feature.properties.region;
                                    
                                    // Map region to city for special cases
                                    if (targetLocation === "northern") targetLocation = "musanze";
                                    if (targetLocation === "western") targetLocation = "rubavu";
                                    if (targetLocation === "southern") targetLocation = "nyanza";
                                    
                                    if (targetLocation !== activeLocation) {
                                        layer.setStyle(provinceStyles.default);
                                    } else {
                                        layer.setStyle(provinceStyles.active);
                                    }
                                });
                            }
                        }).addTo(map);
                    }
                });
            }
            
            // Create district boundaries
            function createDistrictBoundaries() {
                const districts = [];
                
                // Create a district boundary around each location point
                Object.entries(locationInfo).forEach(([id, info]) => {
                    // Create a circle around each location to represent a district
                    const center = info.coords;
                    const radius = 0.05; // in degrees, adjust as needed
                    
                    // Create a simple polygon approximating a circle
                    const points = 20;
                    const polygon = [];
                    
                    for (let i = 0; i < points; i++) {
                        const angle = (i / points) * (Math.PI * 2);
                        const x = center[1] + (Math.cos(angle) * radius);
                        const y = center[0] + (Math.sin(angle) * radius);
                        polygon.push([y, x]);
                    }
                    
                    // Close the polygon
                    polygon.push(polygon[0]);
                    
                    districts.push({
                        "type": "Feature",
                        "properties": {
                            "name": info.title + " District",
                            "id": id
                        },
                        "geometry": {
                            "type": "Polygon",
                            "coordinates": [polygon]
                        }
                    });
                });
                
                return {
                    "type": "FeatureCollection",
                    "features": districts
                };
            }
            
            // Add district boundaries
            const districtBoundaries = createDistrictBoundaries();
            
            L.geoJSON(districtBoundaries, {
                style: districtStyle,
                onEachFeature: function(feature, layer) {
                    // Add district name as tooltip
                    layer.bindTooltip(feature.properties.name, {
                        permanent: false,
                        direction: 'center',
                        className: 'district-tooltip'
                    });
                    
                    // Store reference to layer
                    districtLayers[feature.properties.id] = layer;
                    
                    // Add hover highlight
                    layer.on('mouseover', function() {
                        layer.setStyle(districtHighlightStyle);
                        layer.bringToFront();
                    });
                    
                    // Reset on mouseout
                    layer.on('mouseout', function() {
                        const activeLocation = document.querySelector('.tab.active').getAttribute('data-location');
                        if (feature.properties.id !== activeLocation) {
                            layer.setStyle(districtStyle);
                        } else {
                            // Keep highlight if it's the active district
                            layer.setStyle(districtHighlightStyle);
                        }
                    });
                    
                    // Add click event
                    layer.on('click', function() {
                        updateInfoPanel(feature.properties.id);
                    });
                }
            }).addTo(map);
            
            // Add map legend
            const legend = L.control({position: 'bottomright'});
            
            legend.onAdd = function (map) {
                const div = L.DomUtil.create('div', 'map-legend');
                div.innerHTML = `
                    <div><strong>Legend</strong></div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: #3B729F; border: 1px dashed #3B729F;"></span>
                        <span>Province Boundary</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: #b08d4c; opacity: 0.4;"></span>
                        <span>Selected Province</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: #c90076; border: 2px dashed #c90076;"></span>
                        <span>District Boundary</span>
                    </div>
                `;
                return div;
            };
            
            legend.addTo(map);
            
            // Function to update the info panel
            window.updateInfoPanel = function(location) {
                if (locationInfo[location]) {
                    // Update panel content
                    document.getElementById('location-title').textContent = locationInfo[location].title;
                    document.getElementById('location-info').textContent = locationInfo[location].description;
                    
                    // Update tab active state
                    document.querySelectorAll('.tab').forEach(tab => {
                        tab.classList.remove('active');
                        if (tab.dataset.location === location) {
                            tab.classList.add('active');
                        }
                    });
                    
                    // Pan and zoom to location with smooth animation
                    map.flyTo(locationInfo[location].coords, locationInfo[location].zoom, {
                        duration: 1.5, // Animation duration in seconds
                        easeLinearity: 0.25
                    });
                    
                    // Update marker icons - reset all to default then set active with animation
                    for (const loc in markers) {
                        markers[loc].setIcon(customIcon);
                        markers[loc].setZIndexOffset(0);
                    }
                    markers[location].setIcon(goldIcon);
                    markers[location].setZIndexOffset(1000); // Ensure it's on top
                    
                    // Open popup for the location with slight delay for better animation flow
                    setTimeout(() => {
                        markers[location].openPopup();
                    }, 300);
                    
                    // Reset and highlight province boundaries
                    for (const provinceId in provinceLayers) {
                        provinceLayers[provinceId].setStyle(provinceStyles.default);
                    }
                    
                    // Map specific locations to their provinces
                    let provinceRegion = location;
                    if (location === "musanze") provinceRegion = "northern";
                    if (location === "rubavu") provinceRegion = "western";
                    if (location === "nyanza" || location === "huye" || location === "nyungwe") provinceRegion = "southern";
                    
                    // Highlight the province
                    if (provinceLayers[provinceRegion]) {
                        provinceLayers[provinceRegion].setStyle(provinceStyles.active);
                        provinceLayers[provinceRegion].bringToFront();
                        
                        // Add a pulsing effect to the selected province
                        const pulseProvince = () => {
                            provinceLayers[provinceRegion].setStyle({
                                color: provinceStyles.active.color,
                                weight: provinceStyles.active.weight,
                                opacity: provinceStyles.active.opacity,
                                fillColor: provinceStyles.active.fillColor,
                                fillOpacity: 0.5,
                                dashArray: provinceStyles.active.dashArray
                            });
                            
                            setTimeout(() => {
                                provinceLayers[provinceRegion].setStyle({
                                    color: provinceStyles.active.color,
                                    weight: provinceStyles.active.weight,
                                    opacity: provinceStyles.active.opacity,
                                    fillColor: provinceStyles.active.fillColor,
                                    fillOpacity: 0.3,
                                    dashArray: provinceStyles.active.dashArray
                                });
                            }, 500);
                            
                            setTimeout(() => {
                                provinceLayers[provinceRegion].setStyle(provinceStyles.active);
                            }, 1000);
                        };
                        
                        pulseProvince();
                    }
                    
                    // Update district styling if districts exist
                    for (const distId in districtLayers) {
                        districtLayers[distId].setStyle(districtStyle);
                    }
                    
                    if (districtLayers[location]) {
                        districtLayers[location].setStyle(districtHighlightStyle);
                        districtLayers[location].bringToFront();
                    }
                }
            };
            
            // Set up tab click events
            document.querySelectorAll('.tab').forEach(tab => {
                tab.addEventListener('click', () => {
                    const location = tab.getAttribute('data-location');
                    const locationIds = {
                        'kigali': 1,
                        'rubavu': 2,
                        'musanze': 3,
                        'nyungwe': 4,
                        'nyanza': 5,
                        'huye': 6
                    };
                    
                    const locatid = locationIds[location] || 1; // Default to 1 or whatever makes sense
                    updatePhotoGrid(locatid);
                        
                    // Add a slight scale effect on click
                    tab.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        tab.style.transform = 'scale(1)';
                    }, 150);
                    
                    updateInfoPanel(location);
                });
            });
            
            // "More Images" functionality
            document.querySelector('.more-images').addEventListener('click', () => {
                const activeLocation = document.querySelector('.tab.active').getAttribute('data-location');
                const moreImagesEl = document.querySelector('.more-images');
                
                // Visual feedback on click
                moreImagesEl.style.color = '#7a6229';
                setTimeout(() => {
                    moreImagesEl.style.color = '#b08d4c';
                }, 300);
                
                alert(`This would open a gallery with more images from ${locationInfo[activeLocation].title}.`);
            });
            
            // Explore button functionality
            document.querySelector('.explore-btn').addEventListener('click', () => {
                const activeLocation = document.querySelector('.tab.active').getAttribute('data-location');
                const exploreBtn = document.querySelector('.explore-btn');
                
                // Visual feedback on click
                exploreBtn.style.backgroundColor = '#7a6229';
                setTimeout(() => {
                    exploreBtn.style.backgroundColor = '#b08d4c';
                }, 300);
                
                alert(`This would navigate to a detailed page about ${locationInfo[activeLocation].title}.`);
            });
            
            // Add map controls for better user experience
            map.addControl(new L.Control.Zoom({ position: 'topright' }));
            
            // Add sector boundaries for even more detail (smaller administrative divisions)
            function createSectorBoundaries() {
                const sectors = [];
                
                // Create smaller sectors around main locations
                Object.entries(locationInfo).forEach(([id, info]) => {
                    const center = info.coords;
                    
                    // Create 4 sectors around each location
                    for (let i = 0; i < 4; i++) {
                        const angle = (i / 4) * (Math.PI * 2);
                        const offset = 0.025; // Half the district radius
                        
                        const sectorCenter = [
                            center[0] + (Math.sin(angle) * offset),
                            center[1] + (Math.cos(angle) * offset)
                        ];
                        
                        // Create a small polygon for each sector
                        const sectorPoints = 8;
                        const sectorRadius = 0.015;
                        const polygon = [];
                        
                        for (let j = 0; j < sectorPoints; j++) {
                            const sectorAngle = (j / sectorPoints) * (Math.PI * 2);
                            const x = sectorCenter[1] + (Math.cos(sectorAngle) * sectorRadius);
                            const y = sectorCenter[0] + (Math.sin(sectorAngle) * sectorRadius);
                            polygon.push([y, x]);
                        }
                        
                        // Close the polygon
                        polygon.push(polygon[0]);
                        
                        sectors.push({
                            "type": "Feature",
                            "properties": {
                                "name": `${info.title} Sector ${i+1}`,
                                "district": id
                            },
                            "geometry": {
                                "type": "Polygon",
                                "coordinates": [polygon]
                            }
                        });
                    }
                });
                
                return {
                    "type": "FeatureCollection",
                    "features": sectors
                };
            }
            
            // Add sectors with distinct styling
            const sectorStyle = {
                color: "#228B22", // Forest green
                weight: 2,
                opacity: 0.8,
                fillColor: "#32CD32",
                fillOpacity: 0.05,
                dashArray: '2,2' // Dotted line for distinction
            };
            
            L.geoJSON(createSectorBoundaries(), {
                style: sectorStyle,
                onEachFeature: function(feature, layer) {
                    // Add sector name as tooltip
                    layer.bindTooltip(feature.properties.name, {
                        permanent: false,
                        direction: 'center',
                        className: 'sector-tooltip'
                    });
                    
                    // Add hover effect
                    layer.on('mouseover', function() {
                        layer.setStyle({
                            color: "#32CD32", // Lime green
                            weight: 2.5,
                            opacity: 1,
                            fillOpacity: 0.2,
                            dashArray: null
                        });
                    });
                    
                    // Reset on mouseout
                    layer.on('mouseout', function() {
                        layer.setStyle(sectorStyle);
                    });
                    
                    // Add click event to navigate to parent district
                    layer.on('click', function() {
                        updateInfoPanel(feature.properties.district);
                    });
                }
            }).addTo(map);
            
            // Update legend to include sectors
            const legendElement = document.querySelector('.map-legend');
            const sectorLegendItem = document.createElement('div');
            sectorLegendItem.className = 'legend-item';
            sectorLegendItem.innerHTML = `
                <span class="legend-color" style="background-color: #228B22; border: 1px dotted #228B22;"></span>
                <span>Sector Boundary</span>
            `;
            legendElement.appendChild(sectorLegendItem);
            
            // Initialize with Kigali selected
            updateInfoPanel('kigali');
            
        });

        document.addEventListener('click', function(e) {
            // Check if the clicked element is the "View Details" button
            if (e.target && e.target.classList.contains('view-details-btn')) {
                const location = e.target.getAttribute('data-loc'); // e.g., "kigali"
                const locationCode = getLocationCode(location); // Get mapped code (1, 2, 3...)
                
                // Redirect to the PHP page with the location code
                window.location.href = `../../../modules/General/views/location_x.php?id=${locationCode}`;
            }
        });

            // Function to map location names to codes
        function getLocationCode(location) {
            const locationMap = {
                'kigali': 1,
                'rubavu': 2,
                'musanze': 3,
                'nyungwe': 4,
                'nyanza': 5,
                'huye': 6
            };
            
            return locationMap[location.toLowerCase()] || 1; // Default to 1 (Kigali) if not found
        }

        function updatePhotoGrid(locationId) {
            const locationsData = <?php echo json_encode($locations_js); ?>;
            const location = locationsData[locationId];
            
            console.log('Loading location data for ID:', locationId, location);
            
            if (!location) {
                console.error('Location not found for ID:', locationId);
                return;
            }
            
            const photoGrid = document.querySelector('.photo-grid');
            photoGrid.innerHTML = '';
            
            location.images.forEach((imgPath, index) => {
                const img = document.createElement('img');
                img.src = `../../../assets/image/${imgPath}`; // Using template literal
                img.alt = `${location.name} photo ${index + 1}`;
                img.loading = 'lazy'; // Good for performance
                photoGrid.appendChild(img);
            });
        }
            
    </script>
</body>
</html>