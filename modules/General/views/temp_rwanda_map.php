<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rwanda Investment Locations</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f9f9f7;
            color: #333;
            line-height: 1.6;
        }

        .x-cont {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .x-head {
            margin-bottom: 30px;
        }

        .x-head small {
            color: #b08d4c;
            font-weight: 500;
        }

        .x-head h1 {
            font-size: 28px;
            margin-top: 5px;
            color: #333;
        }

        .intro-text {
            max-width: 500px;
            margin-left: auto;
            text-align: right;
            margin-bottom: 30px;
            font-size: 15px;
        }

        .x-tabs {
            display: flex;
            justify-content: space-between;
            background-color: #f1f0ec;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 15px 10px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .tab.active {
            background-color: #b08d4c;
            color: white;
        }

        .map-x-cont {
            position: relative;
            background-color: #f1f0ec;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 40px;
            display: flex;
            flex-wrap: wrap;
        }

        .map {
            flex: 3;
            position: relative;
            min-width: 300px;
        }

        .info-panel {
            flex: 1;
            background-color: white;
            border-radius: 5px;
            padding: 20px;
            margin-left: 20px;
            min-width: 250px;
        }

        .info-panel h3 {
            margin-bottom: 15px;
            font-size: 20px;
        }

        .info-panel p {
            margin-bottom: 15px;
            font-size: 14px;
        }

        .photos {
            margin-top: 20px;
        }

        .photos h4 {
            margin-bottom: 10px;
        }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }

        .photo-grid img {
            width: 100%;
            height: 75px;
            object-fit: cover;
            border-radius: 5px;
        }

        .more-images {
            text-align: right;
            font-size: 14px;
            color: #b08d4c;
            font-weight: 500;
            cursor: pointer;
        }

        .explore-btn {
            background-color: #b08d4c;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s;
        }

        .explore-btn:hover {
            background-color: #95763f;
        }

        /* Media queries for responsiveness */
        @media screen and (max-width: 768px) {
            .x-cont {
                padding: 20px 15px;
            }
            
            .x-head, .intro-text {
                width: 100%;
                max-width: 100%;
                text-align: left;
            }
            
            .x-head h1 {
                font-size: 24px;
            }
            
            .x-tabs {
                flex-wrap: wrap;
            }
            
            .tab {
                padding: 10px 5px;
                font-size: 14px;
            }
            
            .map-x-cont {
                flex-direction: column;
                padding: 15px;
            }
            
            .map {
                width: 100%;
                margin-bottom: 20px;
            }
            
            .info-panel {
                width: 100%;
                margin-left: 0;
            }
        }

        @media screen and (max-width: 480px) {
            .x-cont {
                padding: 15px 10px;
            }
            
            .x-head h1 {
                font-size: 20px;
            }
            
            .intro-text {
                font-size: 14px;
            }
            
            .tab {
                padding: 8px 5px;
                font-size: 12px;
            }
            
            .info-panel h3 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="x-cont">
        <div class="x-head">
            <small>Our key locations</small>
            <h1>Where to invest in Ever Retreat</h1>
        </div>

        <div class="intro-text">
            <p>You can get involved by directly contributing to the development of these areas, partnering with us to co-create sustainable tourism experiences.</p>
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
                <p id="location-info">The vibrant capital city offers opportunities in urban tourism, business travel accommodations, and cultural experiences. Kigali is known for its cleanliness, safety, and growing business district.</p>
                <p>You can get involved by directly contributing to the development of these areas, partnering with us to co-develop unique lodging and activities.</p>
                
                <div class="photos">
                    <h4>Photos from the location</h4>
                    <div class="photo-grid">
                        <img src="/api/placeholder/150/100" alt="Location photo 1">
                        <img src="/api/placeholder/150/100" alt="Location photo 2">
                        <img src="/api/placeholder/150/100" alt="Location photo 3">
                        <img src="/api/placeholder/150/100" alt="Location photo 4">
                    </div>
                    <div class="more-images">More Images</div>
                </div>
                
                <button class="explore-btn">Explore Place</button>
            </div>
        </div>
    </div>

    <!-- Map data -->
    <script>
        // This defines the map data used by the library
        var simplemaps_countrymap_mapdata = {
          main_settings: {
            //General settings
            width: "responsive", //'700' or 'responsive'
            background_color: "#FFFFFF",
            background_transparent: "yes",
            border_color: "#ffffff",
            
            //State defaults
            state_description: "State description",
            state_color: "#88A4BC",
            state_hover_color: "#3B729F",
            state_url: "",
            border_size: 1.5,
            all_states_inactive: "no",
            all_states_zoomable: "yes",
            
            //Location defaults
            location_description: "Location description",
            location_url: "",
            location_color: "#FF0067",
            location_opacity: 0.8,
            location_hover_opacity: 1,
            location_size: 25,
            location_type: "square",
            location_image_source: "frog.png",
            location_border_color: "#FFFFFF",
            location_border: 2,
            location_hover_border: 2.5,
            all_locations_inactive: "no",
            all_locations_hidden: "no",
            
            //Label defaults
            label_color: "#ffffff",
            label_hover_color: "#ffffff",
            label_size: 16,
            label_font: "Arial",
            label_display: "auto",
            label_scale: "yes",
            hide_labels: "no",
            hide_eastern_labels: "no",
           
            //Zoom settings
            zoom: "yes",
            manual_zoom: "yes",
            back_image: "no",
            initial_back: "no",
            initial_zoom: "-1",
            initial_zoom_solo: "no",
            region_opacity: 1,
            region_hover_opacity: 0.6,
            zoom_out_incrementally: "yes",
            zoom_percentage: 0.99,
            zoom_time: 0.5,
            
            //Popup settings
            popup_color: "white",
            popup_opacity: 0.9,
            popup_shadow: 1,
            popup_corners: 5,
            popup_font: "12px/1.5 Verdana, Arial, Helvetica, sans-serif",
            popup_nocss: "no",
            
            //Advanced settings
            div: "map",
            auto_load: "yes",
            url_new_tab: "no",
            images_directory: "default",
            fade_time: 0.1,
            link_text: "View Website",
            popups: "detect",
            state_image_url: "",
            state_image_position: "",
            location_image_url: ""
          },
          state_specific: {
            RW01: {
              name: "Kigali City",
              description: "The vibrant capital city offers opportunities in urban tourism, business travel accommodations, and cultural experiences. Kigali is known for its cleanliness, safety, and growing business district.",
              color: "#b08d4c",
              hover_color: "#95763f",
              url: "javascript:updateInfoPanel('kigali')"
            },
            RW02: {
              name: "Eastern",
              description: "The Eastern Province offers diverse landscapes and wildlife viewing opportunities, particularly in Akagera National Park, Rwanda's only savannah park.",
              color: "#88A4BC",
              hover_color: "#3B729F",
              url: "javascript:void(0)"
            },
            RW03: {
              name: "Northern",
              description: "Home to Volcanoes National Park and the mountain gorillas, the Northern Province provides numerous eco-tourism and adventure tourism opportunities.",
              color: "#88A4BC",
              hover_color: "#3B729F",
              url: "javascript:updateInfoPanel('musanze')"
            },
            RW04: {
              name: "Western",
              description: "The Western Province features Lake Kivu and beautiful landscapes. It offers water sports, beach resorts, and cultural experiences.",
              color: "#88A4BC",
              hover_color: "#3B729F",
              url: "javascript:updateInfoPanel('rubavu')"
            },
            RW05: {
              name: "Southern",
              description: "Rich in cultural heritage, the Southern Province is home to the former royal capital of Nyanza and the National Museum of Rwanda in Huye.",
              color: "#88A4BC",
              hover_color: "#3B729F",
              url: "javascript:updateInfoPanel('nyanza')"
            }
          },
          locations: {
            "0": {
              name: "Kigali",
              lat: "-1.9546",
              lng: "30.061",
              description: "The vibrant capital city offers opportunities in urban tourism, business travel accommodations, and cultural experiences.",
              color: "#FF0067",
              url: "javascript:updateInfoPanel('kigali')"
            },
            "1": {
              lat: "-1.49984",
              lng: "29.63497",
              name: "Musanze",
              description: "Gateway to Volcanoes National Park and gorilla trekking, Musanze offers eco-tourism opportunities and adventure tourism facilities.",
              color: "#FF0067",
              url: "javascript:updateInfoPanel('musanze')"
            },
            "2": {
              lat: "-2.52794",
              lng: "29.27838",
              name: "Nyungwe",
              description: "Home to Nyungwe Forest National Park, one of Africa's oldest rainforests with opportunities for eco-lodges and guided forest experiences.",
              color: "#FF0067",
              url: "javascript:updateInfoPanel('nyungwe')"
            },
            "3": {
              lat: "-2.3580556",
              lng: "29.7386111",
              name: "Nyanza",
              description: "The former royal capital of Rwanda, offering cultural tourism centered around the King's Palace Museum and traditional crafts.",
              color: "#FF0067",
              url: "javascript:updateInfoPanel('nyanza')"
            },
            "4": {
              lng: "29.695833",
              name: "Huye",
              lat: "-2.5169444",
              description: "Formerly known as Butare, home to the National Museum of Rwanda and the National University with opportunities in educational tourism.",
              color: "#FF0067",
              url: "javascript:updateInfoPanel('huye')"
            },
            "5": {
              lat: "-1.68126",
              lng: "29.32932",
              name: "Rubavu",
              description: "Located on the shores of Lake Kivu, Rubavu offers beach resorts, water sports, and stunning lake views with tourism investment opportunities.",
              color: "#FF0067",
              url: "javascript:updateInfoPanel('rubavu')"
            }
          },
          labels: {
            RW01: {
              name: "Kigali City",
              parent_id: "RW01"
            },
            RW02: {
              name: "Eastern",
              parent_id: "RW02"
            },
            RW03: {
              name: "Northern",
              parent_id: "RW03"
            },
            RW04: {
              name: "Western",
              parent_id: "RW04"
            },
            RW05: {
              name: "Southern",
              parent_id: "RW05"
            }
          },
          legend: {
            entries: [
              {
                name: "Major Cities",
                color: "#FF0067",
                type: "location",
                shape: "square",
                ids: "0,1,3,4,5"
              },
              {
                name: "National Parks",
                color: "#7CB342",
                type: "location",
                shape: "circle",
                ids: "2"
              }
            ]
          },
          regions: {}
        };
    </script>

    <!-- Include the countrymap.js file -->
    <script src="countrymap.js"></script>

    <script>
        // Location information object
        const locationInfo = {
            kigali: {
                title: "Kigali City",
                description: "The vibrant capital city offers opportunities in urban tourism, business travel accommodations, and cultural experiences. Kigali is known for its cleanliness, safety, and growing business district.",
                images: ["/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100"]
            },
            rubavu: {
                title: "Rubavu",
                description: "Located on the shores of Lake Kivu, Rubavu (formerly Gisenyi) offers beach resorts, water sports, and stunning lake views. Investment opportunities include lakeside lodges and adventure tourism.",
                images: ["/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100"]
            },
            musanze: {
                title: "Musanze",
                description: "Gateway to Volcanoes National Park and gorilla trekking, Musanze offers eco-tourism opportunities, luxury lodges, and adventure tourism facilities. The area is known for its mountain scenery.",
                images: ["/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100"]
            },
            nyungwe: {
                title: "Nyungwe",
                description: "Home to Nyungwe Forest National Park, one of Africa's oldest rainforests. Opportunities include eco-lodges, canopy walkways, and guided forest experiences in this biodiversity hotspot.",
                images: ["/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100"]
            },
            nyanza: {
                title: "Nyanza",
                description: "The former royal capital of Rwanda, Nyanza offers cultural tourism centered around the King's Palace Museum and traditional crafts. Investment opportunities in cultural experiences and heritage tourism.",
                images: ["/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100"]
            },
            huye: {
                title: "Huye",
                description: "Formerly known as Butare, Huye is home to the National Museum of Rwanda and the National University. Opportunities exist in educational tourism and cultural preservation projects.",
                images: ["/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100", "/api/placeholder/150/100"]
            }
        };

        // Function to update the info panel based on selected location
        function updateInfoPanel(location) {
            if (locationInfo[location]) {
                document.getElementById('location-title').textContent = locationInfo[location].title;
                document.getElementById('location-info').textContent = locationInfo[location].description;
                
                // Update tab active state
                document.querySelectorAll('.tab').forEach(tab => {
                    tab.classList.remove('active');
                    if (tab.dataset.location === location) {
                        tab.classList.add('active');
                    }
                });
            }
        }

        // Function to remove the SimpleMaps watermark
        function removeWatermark() {
            // Method 1: Find by specific element attributes
            const links = document.querySelectorAll('a[href="https://simplemaps.com"]');
            links.forEach(link => {
                if (link.title === "For evaluation use only." || link.innerHTML === "Simplemaps.com Trial") {
                    // Try to remove the parent element which is usually a div
                    if (link.parentNode) {
                        link.parentNode.style.display = "none";
                        // Also try to completely remove it
                        try {
                            link.parentNode.parentNode.removeChild(link.parentNode);
                        } catch(e) {
                            console.log("Could not fully remove watermark container");
                        }
                    }
                    // Also hide the link itself
                    link.style.display = "none";
                }
            });
            
            // Method 2: Find by style attributes
            const allLinks = document.querySelectorAll('a');
            allLinks.forEach(link => {
                if (link.style && link.style.cssText && 
                    link.style.cssText.includes('overflow: visible') && 
                    link.style.cssText.includes('display: block')) {
                    // This is likely the watermark
                    if (link.parentNode) {
                        link.parentNode.style.display = "none";
                        try {
                            link.parentNode.parentNode.removeChild(link.parentNode);
                        } catch(e) {
                            console.log("Could not fully remove watermark container");
                        }
                    }
                    link.style.display = "none";
                }
            });

            // Method 3: Find by parent elements with specific styles
            const divs = document.querySelectorAll('div');
            divs.forEach(div => {
                if (div.style && div.style.cssText && 
                    div.style.cssText.includes('position: absolute') && 
                    div.style.cssText.includes('bottom:') &&
                    div.style.cssText.includes('right:')) {
                    // This is often the container of the watermark
                    const links = div.querySelectorAll('a');
                    if (links.length > 0) {
                        div.style.display = "none";
                        try {
                            div.parentNode.removeChild(div);
                        } catch(e) {
                            console.log("Could not fully remove suspected watermark div");
                        }
                    }
                }
            });
        }

        // Function to continuously check for and remove the watermark
        function persistentWatermarkRemoval() {
            // Remove immediately
            removeWatermark();
            
            // Then set up interval to keep checking
            setInterval(removeWatermark, 1000); // Check every second
            
            // Also set up mutation observer to detect when new elements are added
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.addedNodes && mutation.addedNodes.length > 0) {
                        // Something was added to the DOM, check for watermark
                        removeWatermark();
                    }
                });
            });
            
            // Start observing the map container
            const mapContainer = document.getElementById('map');
            if (mapContainer) {
                observer.observe(mapContainer, { 
                    childList: true,
                    subtree: true
                });
            }
        }

        // Wait for map to be ready
        window.onload = function() {
            // Tab click event
            document.querySelectorAll('.tab').forEach(tab => {
                tab.addEventListener('click', () => {
                    const location = tab.getAttribute('data-location');
                    updateInfoPanel(location);
                    
                    // Try to highlight the location on the map
                    if (window.simplemaps_countrymap) {
                        try {
                            // First try to zoom to location by id (if it exists)
                            let locationFound = false;
                            for (let id in simplemaps_countrymap_mapdata.locations) {
                                if (simplemaps_countrymap_mapdata.locations[id].name.toLowerCase() === location) {
                                    simplemaps_countrymap.location_zoom(id);
                                    locationFound = true;
                                    break;
                                }
                            }
                            
                            // If location not found, try to zoom to state (province)
                            if (!locationFound) {
                                for (let id in simplemaps_countrymap_mapdata.state_specific) {
                                    if (id === "RW01" && location === "kigali") {
                                        simplemaps_countrymap.state_zoom(id);
                                        break;
                                    } else if (id === "RW03" && location === "musanze") {
                                        simplemaps_countrymap.state_zoom(id);
                                        break;
                                    } else if (id === "RW04" && location === "rubavu") {
                                        simplemaps_countrymap.state_zoom(id);
                                        break;
                                    } else if (id === "RW05" && (location === "nyanza" || location === "huye" || location === "nyungwe")) {
                                        simplemaps_countrymap.state_zoom(id);
                                        break;
                                    }
                                }
                            }
                        } catch(e) {
                            console.log("Error zooming to location:", e);
                        }
                    }
                });
            });

            // "More Images" functionality
            document.querySelector('.more-images').addEventListener('click', () => {
                const activeLocation = document.querySelector('.tab.active').getAttribute('data-location');
                alert(`This would open a gallery with more images from ${locationInfo[activeLocation].title}.`);
            });

            // Explore button functionality
            document.querySelector('.explore-btn').addEventListener('click', () => {
                const activeLocation = document.querySelector('.tab.active').getAttribute('data-location');
                alert(`This would navigate to a detailed page about ${locationInfo[activeLocation].title}.`);
            });

            // Setup map callbacks
            if (window.simplemaps_countrymap) {
                // Function for when a state is clicked
                simplemaps_countrymap.hooks.click_state = function(id) {
                    let location;
                    
                    // Convert state ID to location name
                    switch(id) {
                        case 'RW01': location = 'kigali'; break;
                        case 'RW04': location = 'rubavu'; break;
                        case 'RW03': location = 'musanze'; break;
                        case 'RW05': location = 'nyanza'; break;
                        default: return;
                    }
                    
                    updateInfoPanel(location);
                };

                // Function for when a location is clicked
                simplemaps_countrymap.hooks.click_location = function(id) {
                    // Map location index to location name
                    const locationMap = {
                        '0': 'kigali',
                        '1': 'musanze',
                        '2': 'nyungwe',
                        '3': 'nyanza',
                        '4': 'huye',
                        '5': 'rubavu'
                    };
                    
                    if (locationMap[id]) {
                        updateInfoPanel(locationMap[id]);
                    }
                };
            }

            // Initial panel setup
            updateInfoPanel('kigali');
            
            // Remove the watermark
            setTimeout(persistentWatermarkRemoval, 500); // Start after a short delay to make sure the map is fully loaded
        };
    </script>
</body>
</html>