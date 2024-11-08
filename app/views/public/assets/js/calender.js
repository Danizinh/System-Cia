// script.js

// Extensão do plugin advancedFormat para Day.js
dayjs.extend(dayjs_plugin_advancedFormat);

// Definir a data inicial como o mês atual
let currentDate = dayjs();
let selectedDate = null; // Data inicialmente não selecionada

// Função para atualizar o cabeçalho do calendário
function updateHeader() {
  const calendarHeader = document.getElementById("calendar-header");
  calendarHeader.textContent = currentDate.format("MMMM YYYY");
}

// Função para gerar o calendário do mês atual
function generateCalendar(year, month) {
  const calendar = document.getElementById("calendar");
  calendar.innerHTML = "";

  // Obter o primeiro dia do mês e o número total de dias no mês
  const startOfMonth = dayjs().year(year).month(month).startOf("month");
  const daysInMonth = startOfMonth.daysInMonth();
  const startDay = startOfMonth.day();

  // Adicionar dias vazios para alinhar o início do mês
  for (let i = 0; i < startDay; i++) {
    const emptyCell = document.createElement("div");
    calendar.appendChild(emptyCell);
  }

  // Adicionar dias do mês
  for (let day = 1; day <= daysInMonth; day++) {
    const dayElement = document.createElement("div");
    dayElement.className = "day";
    dayElement.textContent = day;

    // Marcar o dia atual
    if (dayjs().isSame(dayjs().year(year).month(month).date(day), "day")) {
      dayElement.classList.add("current-day");
    }

    // Evento de clique para selecionar e marcar o dia
    dayElement.addEventListener("click", () => {
      // Remover o marcador do dia anteriormente selecionado
      if (selectedDate) {
        selectedDate.classList.remove("selected-day");
      }

      // Adicionar marcador ao dia atualmente selecionado
      dayElement.classList.add("selected-day");
      selectedDate = dayElement;

      // Atualizar o cabeçalho com a data selecionada
      const selectedDay = dayjs().year(year).month(month).date(day);
      updateHeader(selectedDay);
    });

    calendar.appendChild(dayElement);
  }
}

// Funções de navegação
document.getElementById("prev-month").addEventListener("click", () => {
  currentDate = currentDate.subtract(1, "month");
  updateHeader();
  generateCalendar(currentDate.year(), currentDate.month());
});

document.getElementById("next-month").addEventListener("click", () => {
  currentDate = currentDate.add(1, "month");
  updateHeader();
  generateCalendar(currentDate.year(), currentDate.month());
});

// Inicializar o calendário e o cabeçalho
updateHeader();
generateCalendar(currentDate.year(), currentDate.month());
