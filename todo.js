function addTask() {
    var taskInput = document.getElementById("taskInput");
    var taskList = document.getElementById("taskList");

    if (taskInput.value.trim() !== "") {
        var listItem = document.createElement("li");
        listItem.className = "task-item";
        listItem.innerHTML = `
            <span>${taskInput.value}</span>
            <button class="btn btn-danger" onclick="removeTask(this)">Remove</button>
        `;
        taskList.appendChild(listItem);
        taskInput.value = "";
    }
}

function removeTask(button) {
    var listItem = button.parentNode;
    var taskList = listItem.parentNode;
    taskList.removeChild(listItem);
}