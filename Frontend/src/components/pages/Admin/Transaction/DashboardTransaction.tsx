import Sidebar from "../organs/Sidebar.tsx";
import AdminNavBar from "../organs/NavBar.tsx";
import TransactionTable from "../components/TransactionTable.tsx";

const DashboardTransaction = () => {
    return (
        <div className="w-full h-screen">
            <div>
                <AdminNavBar />
            </div>
            <div className="flex flex-row bg-gray-100">
                <div className="basis-1/5">
                    <Sidebar />
                </div>
                <div className="basis-4/5">
                    <TransactionTable />
                </div>
            </div>
        </div>
    )
}

export default DashboardTransaction