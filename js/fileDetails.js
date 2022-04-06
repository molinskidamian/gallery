(function () {
	if (!window.FileReader) return;

	const fileInput = document.querySelector('#fileInput');

	fileInput.onchange = function () {
		const file = this.files[0];

		document.querySelector('#fileName').innerHTML = `Nazwa: ${file.name}`;
		document.querySelector('#fileSize').innerHTML = `Rozmiar: ${file.size}`;
		document.querySelector('#fileType').innerHTML = `Typ: ${file.type}`;
		document.querySelector(
			'#fileLastModifiedDate'
		).innerHTML = `Ostatnia modyfikacja: ${file.lastModifiedDate}`;
		console.log('załadowano plik');
	};
})();
