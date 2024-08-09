$(document).ready(function() {
    // Carregar notas do localStorage
    loadNotes();

    $('#saveNote').click(function() {
        let noteText = $('#noteText').html();
        let noteCategory = $('#noteCategory').val();

        if (noteText) {
            let note = {
                text: noteText,
                category: noteCategory
            };
            saveNoteToLocalStorage(note);
            addNoteToDOM(note);
            $('#noteText').html('');
            $('#noteCategory').val('Geral');
            showNotification('Nota salva com sucesso!');
        }
    });

    $('#saveNote').hover(
        function() {
            $(this).addClass('animate__bounce');
        },
        function() {
            $(this).removeClass('animate__bounce');
        }
    );

    $('#savePDF').click(function() {
        saveSelectedNotesAsPDF();
    });
});

function execCmd(command, value = null) {
    document.execCommand(command, false, value);
}

function saveNoteToLocalStorage(note) {
    let notes = JSON.parse(localStorage.getItem('notes')) || [];
    notes.push(note);
    localStorage.setItem('notes', JSON.stringify(notes));
}

function loadNotes() {
    let notes = JSON.parse(localStorage.getItem('notes')) || [];
    notes.forEach(note => addNoteToDOM(note));
}

function addNoteToDOM(note) {
    let noteElement = $('<div class="note animate__animated animate__fadeIn"></div>');
    noteElement.append($('<div></div>').html(note.text));
    noteElement.append($('<p class="note-category"></p>').text(note.category));
    noteElement.append($('<input type="checkbox" class="note-checkbox">'));
    $('#notesList').append(noteElement);
}

function saveSelectedNotesAsPDF() {
    const { jsPDF } = window.jspdf;
    let doc = new jsPDF();
    let selectedNotes = $('.note-checkbox:checked').parent();

    selectedNotes.each(function(index, noteElement) {
        let noteText = $(noteElement).find('div').html();
        let noteCategory = $(noteElement).find('.note-category').text();
        doc.fromHTML(noteText, 10, 10 + (index * 30));
        doc.text(noteCategory, 10, 20 + (index * 30));
    });

    doc.save('notas.pdf');
}

function showNotification(message) {
    let notification = $('#notification');
    notification.text(message);
    notification.fadeIn();

    setTimeout(function() {
        notification.fadeOut();
    }, 3000);
}
