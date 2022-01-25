import "./sidebar.css"
import React from "react"
import Icon from "../../icon"

const Sidebar = React.memo(() => {
    return <div className="sidebar-content">
        <ul className="navigation-items">
            <li>
                <Icon icon="users-cog" />
                <a href="#">Utilisateurs</a>
            </li>
            <li>
                <Icon icon="calendar" />
                <a href="#">Tickets Toilettes</a>
            </li>
        </ul>
    </div>
})

export default Sidebar