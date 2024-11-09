// create Snap! iframes for embedded projects
window.addEventListener(
    'DOMContentLoaded', 
    function () {
        const path_to_ai_folder = "https://ecraft2learn.github.io/";
        let elements = document.getElementsByClassName('snap-iframe');
        let snap_iframe = function(element) {
            let name = element.id;
            let style = element.getAttribute('container_style');
            let caption = element.getAttribute('caption');
            let run_full_screen = element.getAttribute('run_full_screen');
            let full_screen = run_full_screen || element.getAttribute('full_screen');
            let edit_mode = element.getAttribute('edit_mode');
            let stage_ratio = element.getAttribute('stage_ratio');
            let figure     = document.getElementById(name);
            let iframe     = document.createElement('iframe');
            let figcaption = document.createElement('figcaption');
            let img        = document.createElement('img');
            const path_to_images = element.getAttribute('path_to_images');
            const path_to_projects = element.getAttribute('path_to_projects');
            const snap_url = element.getAttribute('snap_url') || path_to_ai_folder + "/ai/snap/snap.html";
            if (path_to_images) {
            img.src = path_to_images + name + ".png"; 
            } else {
            img.src = path_to_ai_folder + "/ai/AI-Teacher-Guide/images/" + name + ".png";    
            }             
            img.className = "max-w-xl cursor-pointer mx-auto";
            figcaption.className = "text-center";
            let replace_with_iframe = function () {
            // add a loading div message for a few seconds...
            let loading = document.createElement('div');
            let project_folder;
            loading.innerHTML = '<p class="text-center text-orange-400">Memuat, harap tunggu.</p>';
            figure.insertBefore(loading, figcaption);
            img.remove();
    //                  const local_web_server = 
    //                       window.location.protocol == 'file:' || 
    //                       window.location.hostname  === 'localhost' ||
    //                       window.location.hostname  === '127.0.0.1';
            let iframe_src = //local_web_server ? 
                     "https://ecraft2learn.github.io/ai/snap/snap.html?project=" + name; 
                     //snap_url + "#present:Username=toontalk&ProjectName=" + name + search;                
            if (full_screen !== 'true' || edit_mode === 'true') {
                iframe_src += "&editMode";
            }
            iframe.src = iframe_src;
            iframe.setAttribute('scrolling', 'no');
            // remove loading message 1 second after Snap! loads
            // since project loading takes time too
            iframe.addEventListener('load',    
                        function () {
                            setTimeout(function () {
                            loading.remove();
                            },
                            1000);
                        });
            project_folder = path_to_projects || path_to_ai_folder + "ai/projects/";
            if (full_screen) {
                if (full_screen === 'true') {
                iframe.setAttribute('full_screen', 'true');
                }
                if (edit_mode) {
                iframe.setAttribute('edit_mode', 'true');
                }
                if (stage_ratio) {
                iframe.setAttribute('stage_ratio', stage_ratio);
                }
                iframe.style = style;
                figure.insertBefore(iframe, figcaption);
            } else {
                iframe.className = "iframe-clipped";
                let iframe_style = element.getAttribute('iframe_style');
                if (iframe_style) {
                iframe.style = iframe_style;
                }
                let div = document.createElement('div');
                div.className = "w-64 h-8 m-auto border-2 border-orange-400 rounded-lg overflow-hidden";
                const zoom = +(localStorage && localStorage['-snap-setting-zoom']);
                div.style = style;
                if (zoom > 1) {
                // need to adjust width and height for zoom
                const multiply = (measure, factor) => {
                    if (+measure > 0) {
                     return +measure * factor;
                    }
                    const number = +measure.match(/\d+/g)[0];
                    const units = measure.match(/[a-zA-Z]+/g)[0];
                    return number * zoom + units;
                };
                div.style.width = multiply(div.style.width, zoom);
                div.style.height = multiply(div.style.height, zoom);
                }
                div.appendChild(iframe);
                figure.insertBefore(div, figcaption);
            }
            iframe.setAttribute('project_path', project_folder + name + ".xml"); 
            };
            img.addEventListener('click', replace_with_iframe);
            img.addEventListener('touchstart', replace_with_iframe);
            figcaption.innerHTML = caption;
            figure.appendChild(img);
            figure.appendChild(figcaption);
            if (window.location.search.indexOf("preload") >= 0) {
            replace_with_iframe();
            }
        }
        Array.prototype.forEach.call(elements, snap_iframe);
           
    });