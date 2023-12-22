import AdminLayout from "@/components/layout/admin/AdminLayout"
import AuthCreate from "@/features/auth/components/Create"

export default function Home() {
    return (
        <>
            <AdminLayout>
                <AuthCreate />
            </AdminLayout>
            {/* <About /> */}
        </>
    )
}
