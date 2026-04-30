//4.3 update selected colors from dropdown
document.addEventListener('DOMContentLoaded', function () {
	// 1.3 Coordinate Tracking
	let coordinates = {};

	const dropdowns = document.querySelectorAll('.color-dropdown');
	const messageBox = document.getElementById('color-message');

	function showMessage(text) {
		messageBox.textContent = text;
		messageBox.style.display = 'block';

		setTimeout(function () {
			messageBox.style.display = 'none';
		}, 2500);
	}

	dropdowns.forEach(function (dropdown) {
		dropdown.dataset.previousValue = dropdown.value;

		dropdown.addEventListener('focus', function () {
			this.dataset.previousValue = this.value;
		});

		dropdown.addEventListener('change', function () {
			const newValue = this.value;
			let duplicateFound = false;

			dropdowns.forEach(function (otherDropdown) {
				if (otherDropdown !== dropdown && otherDropdown.value === newValue) {
					duplicateFound = true;
				}
			});

			if (duplicateFound) {
				this.value = this.dataset.previousValue;
				showMessage('That color is already in use. Please choose a different one.');
			} else {
				this.dataset.previousValue = this.value;

				const row = this.closest('tr');
				const previewCell = row.querySelector('.preview');

				previewCell.textContent = this.value;
				previewCell.style.backgroundColor = this.value.toLowerCase();
			}
		});
	});

	// 1.2 Painting cells in the grid
	const gridCells = document.querySelectorAll('.coordinate-grid td');

	gridCells.forEach(function (cell) {
		cell.addEventListener('click', function () {
			if (cell.cellIndex == 0 || cell.parentElement.rowIndex == 0) {
				return;
			}

			const selectedRadio = document.querySelector("input[name='active_color']:checked");
			const selectedRow = selectedRadio.value;
			const selectedDropdown = document.querySelectorAll('.color-dropdown')[selectedRow];
			const selectedColor = selectedDropdown.value;

			cell.style.backgroundColor = selectedColor.toLowerCase();
			
			// 1.3 Coordinate Tracking
			const colCoord = String.fromCharCode(64 + cell.cellIndex);
			const rowCoord = cell.parentElement.rowIndex;
			const coordinate = colCoord + rowCoord;

			if (!coordinates[selectedColor]) {
				coordinates[selectedColor] = [];
			}

			if (!coordinates[selectedColor].includes(coordinate)) {
				coordinates[selectedColor].push(coordinate);
			}

			updateTable();
		});
	});

	function updateTable() {
		const dropdowns = document.querySelectorAll('.color-dropdown');

		dropdowns.forEach((dd, i) => {
			const color = dd.value;
			const coords = coordinates[color] || [];

			const previewCell = document.querySelector(`#coords-${i}`);
			if (previewCell) {
				previewCell.textContent = coords.join(", ");
			}
		});
	}
});
