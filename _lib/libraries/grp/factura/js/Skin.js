function ExpandContainer(imgObject) {

    if (imgObject == null) return;
    var oContainer = document.getElementById(imgObject.getAttribute("containername"));

    if (oContainer == null) return;

    var oHide = document.getElementById(imgObject.getAttribute("inputhiddenname"));
    if (oHide == null) return;

    if (oHide.value == "E") {
        oContainer.style.display = 'block';
        oContainer.style.visibility = 'visible';
        oHide.value = "C";
        if (imgObject.getAttribute("iconexpandurl").startsWith('~/')) {
            imgObject.src = imgObject.getAttribute("iconexpandurl").substring(2);
        }
        else {
            imgObject.src = imgObject.getAttribute("iconcollapseurl");
        }
        imgObject.title = imgObject.getAttribute("altcollapse");
    } else {
        oContainer.style.display = 'none';
        oContainer.style.visibility = 'hidden';
        oHide.value = "E";
        if (imgObject.getAttribute("iconexpandurl").startsWith('~/')) {
            imgObject.src = imgObject.getAttribute("iconexpandurl").substring(2);
        }
        else {
            imgObject.src = imgObject.getAttribute("iconexpandurl");
        }
        imgObject.title = imgObject.getAttribute("altexpand");
    }
}