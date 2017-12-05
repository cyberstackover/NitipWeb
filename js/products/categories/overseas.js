/* jshint undef: true, unused: true */
/* global define: false */



var a = "Irawan";




define([], function(){
	return {
			
		name: "Overseas",
		oneRow: false,
	//	imagesPath: "http://placehold.it/",
		imagesPath: "images/oversea/",
		imagesPICPath: "images/member/",
		addCodePath: false,
		items: [
			{
				pic:a,//"Irawan",
				name: "Zam zam water",
				from: "Mecca, Saudi Arabia",
				to: "Jakarta, Indonesia",
				price: {
					current: "10000"
				},
				code: "N8101",
				details: "Holy water that only happen in mecca, Saudi Arabia.",
				departure_date : "2017, Jan 5",
				arrival_date : "2017, Jan 6",
				thumb: "1.jpg",				
				gallery: ["1.jpg", "1_1.jpg", "1_2.jpg"],	
				pic_image:"1.jpg"
			}
		]
	};
});

