import { useCallback, useState } from "react";


export default function useCurrentUser () 
{
    const [user, setUSer] = useState({})
    const [error, setError] = useState(null)

    const getUserCurrent = useCallback(async() => {
        try {
            const response = await fetch(
                '/api/user/current'
            ).then(r => r.json())
            setUSer(response)

        } catch (e) {
            setError(e)
        }

    }, [])

    return {
        user,
        error,
        getUserCurrent
    }
}