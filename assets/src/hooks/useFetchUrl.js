import React, {useCallback, useState} from 'react'


async function jsonFetch (url, method="GET", data = null) {
    
    const params = {
        method: method,
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'applicaton/json'
        }
    }

    if (data) {
        params.body = JSON.stringify(data)
    }

    const response = await fetch(url, params)
    
    if (response.status === 204) {
        return null
    }

    const responseData = await response.json()
    if (response.ok) {
        return responseData

    } else {
        throw responseData
    }
}

const useLoadFetchUrl = (url) => {
    const [data, setData] = useState([])
    const [loading, setLoading] = useState(false)
    const [error, setError] = useState(null)
    
    const load = useCallback(async() => {
        setLoading(true)
        try {
            const response = await jsonFetch(url)
            setData(response)
        } catch (e) {
            if (!(e instanceof DOMException) || e.code !== e.ABORT_ERR) {
                setError(e)
            }
        }

        setLoading(false)

    }, [url])

    return {
        data,
        loading,
        error,
        load
    }
}

const useFetch = (url, method="POST", callback = null) => {
    console.log(url)
    
    const [errors, setErrors] = useState({})
    const [loading, setLoading] = useState(false)

    const load = useCallback(async (data) => {

        setLoading(true)
        try {
            const response = await jsonFetch(url, method, data)
            callback(response)
        } catch (errors) {

            setErrors(errors)
        }
        setLoading(false)

    }, [url, method, callback])

    return {errors, loading, load}
}



export {useLoadFetchUrl, useFetch}