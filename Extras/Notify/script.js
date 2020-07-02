var successClick = function(){
  $.notify({
	// options
	title: '<strong>Success</strong>',
	message: "<br>Facendo click su questa notifica, si aprirà la pagina di Robert McIntosh, autore del plugin <em><strong>notify.js</strong></em>",
  icon: 'glyphicon glyphicon-ok',
	url: 'https://github.com/mouse0270/bootstrap-notify',
	target: '_blank'
},{
	// settings
	element: 'body',
	//position: null,
	type: "success",
	//allow_dismiss: true,
	//newest_on_top: false,
	showProgressbar: false,
	placement: {
		from: "top",
		align: "right"
	},
	offset: 20,
	spacing: 10,
	z_index: 1031,
	delay: 3300,
	timer: 1000,
	url_target: '_blank',
	mouse_over: null,
	animate: {
		enter: 'animated fadeInDown',
		exit: 'animated fadeOutRight'
	},
	onShow: null,
	onShown: null,
	onClose: null,
	onClosed: null,
	icon_type: 'class',
});
}

var infoClick = function(){
  $.notify({
	// options
	title: '<strong>Info</strong>',
	message: "<br>Lorem ipsum Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum.",
  icon: 'glyphicon glyphicon-info-sign',
},{
	// settings
	element: 'body',
	position: null,
	type: "info",
	allow_dismiss: true,
	newest_on_top: false,
	showProgressbar: false,
	placement: {
		from: "top",
		align: "right"
	},
	offset: 20,
	spacing: 10,
	z_index: 1031,
	delay: 3300,
	timer: 1000,
	url_target: '_blank',
	mouse_over: null,
	animate: {
		enter: 'animated bounceInDown',
		exit: 'animated bounceOutUp'
	},
	onShow: null,
	onShown: null,
	onClose: null,
	onClosed: null,
	icon_type: 'class',
});
}

var warningClick = function(){
  $.notify({
	// options
	title: '<strong>Warning</strong>',
	message: "<br>Lorem ipsum Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum.",
  icon: 'glyphicon glyphicon-warning-sign',
},{
	// settings
	element: 'body',
	position: null,
	type: "warning",
	allow_dismiss: true,
	newest_on_top: false,
	showProgressbar: false,
	placement: {
		from: "top",
		align: "right"
	},
	offset: 20,
	spacing: 10,
	z_index: 1031,
	delay: 3300,
	timer: 1000,
	url_target: '_blank',
	mouse_over: null,
	animate: {
		enter: 'animated bounceIn',
		exit: 'animated bounceOut'
	},
	onShow: null,
	onShown: null,
	onClose: null,
	onClosed: null,
	icon_type: 'class',
});
}

var dangerClick = function(){
  $.notify({
	// options
	title: '<strong>Danger</strong>',
	message: "<br>Lorem ipsum Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum.",
  icon: 'glyphicon glyphicon-remove-sign',
},{
	// settings
	element: 'body',
	position: null,
	type: "danger",
	allow_dismiss: true,
	newest_on_top: false,
	showProgressbar: false,
	placement: {
		from: "top",
		align: "right"
	},
	offset: 20,
	spacing: 10,
	z_index: 1031,
	delay: 3300,
	timer: 1000,
	url_target: '_blank',
	mouse_over: null,
	animate: {
		enter: 'animated flipInY',
		exit: 'animated flipOutX'
	},
	onShow: null,
	onShown: null,
	onClose: null,
	onClosed: null,
	icon_type: 'class',
});
}

var primaryClick = function(){
  $.notify({
	// options
	title: '<strong>Primary</strong>',
	message: "<br>Lorem ipsum Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum.",
  icon: 'glyphicon glyphicon-ruble',
},{
	// settings
	element: 'body',
	position: null,
	type: "success",
	allow_dismiss: true,
	newest_on_top: false,
	showProgressbar: false,
	placement: {
		from: "top",
		align: "right"
	},
	offset: 20,
	spacing: 10,
	z_index: 1031,
	delay: 3300,
	timer: 1000,
	url_target: '_blank',
	mouse_over: null,
	animate: {
		enter: 'animated lightSpeedIn',
		exit: 'animated lightSpeedOut'
	},
	onShow: null,
	onShown: null,
	onClose: null,
	onClosed: null,
	icon_type: 'class',
});
}

var defaultClick = function(){
  $.notify({
	// options
	title: '<strong>Default</strong>',
	message: "<br>Lorem ipsum Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum.",
  icon: 'glyphicon glyphicon-ok-circle',
},{
	// settings
	element: 'body',
	position: null,
	type: "warning",
	allow_dismiss: true,
	newest_on_top: false,
	showProgressbar: false,
	placement: {
		from: "top",
		align: "right"
	},
	offset: 20,
	spacing: 10,
	z_index: 1031,
	delay: 3300,
	timer: 1000,
	url_target: '_blank',
	mouse_over: null,
	animate: {
		enter: 'animated rollIn',
		exit: 'animated rollOut'
	},
	onShow: null,
	onShown: null,
	onClose: null,
	onClosed: null,
	icon_type: 'class',
});
}

var linkClick = function(){
  $.notify({
	// options
	title: '<strong>Link</strong>',
	message: "<br>Lorem ipsum Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum.",
  icon: 'glyphicon glyphicon-search',
},{
	// settings
	element: 'body',
	position: null,
	type: "danger",
	allow_dismiss: true,
	newest_on_top: false,
	showProgressbar: false,
	placement: {
		from: "top",
		align: "right"
	},
	offset: 20,
	spacing: 10,
	z_index: 1031,
	delay: 3300,
	timer: 1000,
	url_target: '_blank',
	mouse_over: null,
	animate: {
		enter: 'animated zoomInDown',
		exit: 'animated zoomOutUp'
	},
	onShow: null,
	onShown: null,
	onClose: null,
	onClosed: null,
	icon_type: 'class',
});
}