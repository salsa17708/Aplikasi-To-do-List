<template>
  <div>
    <h2>To-Do List Anda</h2>
    <div v-for="task in tasks" :key="task.id" class="task-item">
      <input type="checkbox" :checked="task.is_completed">
      <span :class="{ 'completed': task.is_completed }">
        {{ task.task_details }}
      </span>
      <small v-if="task.due_date"> | Due: {{ task.due_date }}</small>
    </div>
    <p v-if="tasks.length === 0">Tidak ada tugas saat ini.</p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios'; // Pastikan axios sudah terinstal

const tasks = ref([]);

const fetchTasks = async () => {
  try {
    // Panggil API endpoint yang sudah kita definisikan di Laravel
    const response = await axios.get('/api/tasks'); 
    tasks.value = response.data;
  } catch (error) {
    console.error("Gagal mengambil tugas:", error);
  }
};

onMounted(() => {
  fetchTasks(); // Panggil fungsi saat komponen dimuat
});
</script>

<style scoped>
.completed {
  text-decoration: line-through;
  color: gray;
}
</style>