import { onMounted } from 'vue';
import { fetchArticles, currentPage } from './PublishedArticlesView.vue';

onMounted(() => {

fetchArticles(currentPage.value);
});
