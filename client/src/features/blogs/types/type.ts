export type Blog = {
  id: number;
  admin_id: number;
  title: string;
  content: string;
  featured_image: string;
  slug: string;
  public_status: number;
  meta_title: string;
  meta_description: string;
  created_at: string;
  updated_at: string;
};

export type Response = {
  blogs: Blog[]
  blog: Blog
}