/* jshint undef: true, unused: true */
/* global define: false */
define(['backbone'], function(Backbone){
	"use strict";

	var ItemView = Backbone.View.extend({
		tagName: 'div',
		className: 'prod-item l-mb-40',

		template: _.template([
		'<p class="prod-name"><%= name %></p>',

		'<table height="200" width="100%" valign="top" style="float: left">',
				'<tr>',
					'<td>',
		
						'<div class="image-block">',

							'<% if (label.text !== "") { %>',
							'<span class="best-seller-block">',
								'<i class="fa <% if (_.isEmpty(label.icon)){ %>fa-bomb<%} else {%><%= label.icon %><%}%>"></i><%= label.text %>',
							'</span>',
							'<% } %>',

							'<div class="img_display"><img src="<%= path %><%= thumb %>" alt="" class="img-responsive"></div>',
							'<div class="prod-hover-view">',
								'<ul class="hover-controls">',
									'<li class="view-product-gallery js-view-product" data-target="<%= cid %>">',
										'<span></span>',
									'</li>',
									'<li class="add-product-code" data-target="<%= cid %>">',
										'<span></span>',
									'</li>',
								'</ul>',
							'</div>',
						'</div>',
						
					'<td>',
				'<tr>',
			'</table>',
	

	
	
			'<table height="150" width="32%" valign="top" style="float: left">',
				'<tr>',
					'<td height="70" bgcolor="white" align="left">',	
							'<div class="circular">',
								'<img src="<%= PICpath %><%= pic_image %>" alt="">',
							'</div>',	
						'</td>',
					'</td>',
				'</tr>',
				'<tr>',
					'<td  bgcolor="white" align="center" >',
						'<div class="gen-product-information">',
							'<p class="prod-pic"><%= pic %></p>',				
						'</div>',	
					'</td>',
				'</tr>',
			'</table>',
			'<table height="150" width="1%" valign="top" align="left" border=0>',			
				'<tr>',
					'<td  bgcolor="white" align="left" >',
						'<div class="gen-product-info">',
							'<p class="prod-price"><br></p>',				
						'</div>',	
					'</td>',
				'</tr>',
			'</table>',
			'<table height="150" width="59%" valign="top" align="left">',
				'<tr>',
					'<td height="1" bgcolor="white" align="left">',					
						'<div class="gen-product-information">',
							'<p class="prod-from"><%= from %></p>',
						'</div>',
					'</td>',
				'</tr>',
				'<tr>',
					'<td  bgcolor="white" align="left">',
						'<div class="gen-product-information">',
							'<p class="prod-to"><%= to %></p>',
						'</div>',
					'</td>',
				'</tr>',
			'</table>',

			
/*			
						'<div class="gen-product-info">',
							'<p class="prod-pic"><%= pic %></p>',				
						'</div>',
						'<div class="gen-product-info">',
							'<p class="prod-price">&nbsp</p>',
						'</div>',
									'<div class="gen-product-info">',
										'<p class="prod-from"><%= from %></p>',
									'</div>',
									'<div class="gen-product-info">',
										'<p class="prod-to"><%= to %></p>',
									'</dif>',
*/			
			

		].join('')),

		
		initialize: function () {
			var that = this;
			
			var templateData = _.extend(that.model.toJSON(), { cid: that.model.cid });
			that.$el.append(that.template(templateData));

			// Bind controls
			$('.js-view-product', that.$el).click(function () {
				$(window).trigger('showProductItem', $(this).data('target'));
			});

			// Bind add to cart
			$('.add-product-code', that.$el).click(function () {
				$(window).trigger('addToCart', $(this).data('target'));

				var plusOne = $('<div class="plusOne">+1</div>');
				plusOne.appendTo($(this));
				setTimeout(function() {
					$(plusOne, $(this)).remove();
				}, 1000);
			});

			$('.currency', that.$el).html($('body').data('currency'));
		},

		render: function () {
			return this;
		}
	});

	return ItemView;
});