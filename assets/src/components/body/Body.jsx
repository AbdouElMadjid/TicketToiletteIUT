import "./body.css"
import React, { useEffect } from "react"
import Icon from "../../icon"
import { useLoadFetchUrl } from "../../hooks/useFetchUrl"
import moment from "moment"


const Navbar = function () {
    return <div className="navbar-admin">
        <div className="toggle-burger">
            <span></span><span></span><span></span>
        </div>
        <div className="search-data">
            <Icon icon="search" />
            <input type="search" placeholder="Rechercher" />
        </div>
        <div className="avatar-user">
            <Icon icon="user" />
        </div>
    </div>
}

const RowOfItem = function ({ etudient }) {

    const calandar = {
        "sameDay": "[Aujourd'hui]",
        "nextDay": "[Demain]",
        "nexWeek": 'dddd',
        "lastDay": '[Hier]',
        "lastWeek": 'dddd [Dernier]',
        "sameElse": 'DD/MM/YYYY'
    }

    let createdAt = moment(etudient.ticketToilette.createdAt, null, 'fr').calendar(calandar)
    let expiratedAt = moment(etudient.ticketToilette.expiratedAt, null, 'fr').calendar(calandar)
    let date = new Date()

    let valide = date < new Date(etudient.ticketToilette.expiratedAt) ? "Valide" : "Invalide"

    console.log(moment().millisecond(), moment(etudient.ticketToilette.expiratedAt, null, 'fr').millisecond())

    return <tr>
        <td>{etudient.matricule}</td>
        <td>{etudient.firstname}</td>
        <td>{etudient.secondname}</td>
        <td><span className={valide}>{valide}</span></td>
        <td>{createdAt}</td>
        <td>{expiratedAt}</td>
        <td>{etudient.ticketToilette.type}</td>
        <td className="action">
            <button className="edit"><Icon icon="edit" /></button>
            <button className="remove"><Icon icon="trash" /></button>
        </td>
    </tr>
}

const Body = React.memo(() => {
    const { data: etudients, load, loading, error } = useLoadFetchUrl("api/etudiants")
    let row = []

    etudients.forEach(etudient => {
        row.push(<RowOfItem key={etudient.matricule} etudient={etudient} />)
    })

    useEffect(() => {
        load()
    }, [])

    console.log(etudients)

    return <div className="body-content">
        <Navbar />
        <div className="content">
            <table>
                <thead>
                    <tr>
                        <th>matricule</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>ticket</th>
                        <th>date de creation</th>
                        <th>date d'expiration</th>
                        <th>type</th>
                        <th colSpan={2}>action</th>
                    </tr>
                </thead>
                <tbody>
                    {row}
                </tbody>
            </table>
        </div>
    </div>
})

export default Body