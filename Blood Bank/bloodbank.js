var body = document.getElementsByTagName("body")[0];
var search = document.getElementsByTagName("h3")[0];
var boxes = document.getElementsByClassName("container")

var container;
var photocontainer;
var img;
var info;
var bloodbank;
var address;
var hr;
var rating;
var contact;
var bold;
var enquiry;
var btn;
var ahef;

var src = "././bb-1.jpeg";
var bbName = "Name of Blood Bank";
var bbAddress = "Address of BLood Bank";
var mobile = "XXXXX XXXXX";

function creator(src, bbName, bbAddress, mobile, bblink) {

    //photocontainer div-----------------------------
    photocontainer = document.createElement("div");
    photocontainer.classList.add("photocontainer");

    img = document.createElement("img");
    img.src = src;

    photocontainer.appendChild(img);

    //Info div----------------------------------------
    info = document.createElement("div");
    info.classList.add("info");

    bloodbank = document.createElement("h2");
    bloodbank.innerText = bbName;

    address = document.createElement("h4");
    address.innerText = bbAddress;

    hr = document.createElement("hr");

    rating = document.createElement("h4");
    rating.innerText = "Rating : ⭐⭐⭐⭐";

    contact = document.createElement("h3");

    bold = document.createElement("b");
    bold.innerText = "Contact = " + mobile;

    contact.appendChild(bold);
    info.appendChild(bloodbank);
    info.appendChild(address);
    info.appendChild(hr);
    info.appendChild(rating);
    info.appendChild(contact);

    //Enquiry div-------------------------------------
    enquiry = document.createElement("div");
    enquiry.classList.add("enquiry");

    btn = document.createElement("button");

    ahef = document.createElement("a");
    ahef.href = bblink;
    ahef.innerText = "Enquiry";

    btn.appendChild(ahef);
    enquiry.appendChild(btn);

    //main container----------------------------------
    container = document.createElement("div");
    container.classList.add("container");

    container.appendChild(photocontainer);
    container.appendChild(info);
    container.appendChild(enquiry);

    body.appendChild(container);

}

var BBnames = ["Sarla Blood Bank", "Tarapore Automic Power Station Hospital Blood Bank", "Vijayee Blood Bank Vasai (w)", "Maharashtra BloodBank, Component & Apheresis Cenre"];
var BBaddress = ["Ravi Hospital 1st Floor 50, Anand Nagar Navghar Vasai (W)-401202", "TAPS Hospital Blood Bank, TAPS Colony Near Boisar,TQ-Palghar Dist-Palghar-401504", "Andrandis Bhavan 1st floor PL.no-2 Sr.No, 277A, Near papdi Telephone exchange near Sai Service station Vasai(w)", "Maharashtra BloodBank, Component & Apheresis Cenre C- wing, 107/207, Kuldeep Arcade, Near Navli Railway Phatak, Station Road, Palghar (w), Dist: Thane - 401 404"];
var BBmobile = ["95250-2332684 / 2349950", "02525-264001-5 Ext-4484", "0250-2321050- 6450250", "02525-251102 / 253102"];
var bbimgsrc = ["./2.jpg", "./1.jpg", "./3.jpg", "./2.jpg"];
var BBsrc = ["https://mahasbtc.org/index.php/blood-bank-info/?bbid=bb166", "https://mahasbtc.org/index.php/blood-bank-info/?bbid=bb268", "https://mahasbtc.org/index.php/blood-bank-info/?bbid=bb334", "https://mahasbtc.org/index.php/blood-bank-info/?bbid=bb357"];

search.onclick = () => {

    boxes[0].style.display = "none";
    boxes[1].style.display = "none";
    boxes[2].style.display = "none";

    var n = BBnames.length;

    for (let i = 0; i < n; i++) {
        creator(bbimgsrc[i], BBnames[i], BBaddress[i], BBmobile[i], BBsrc[i]);
    }
}