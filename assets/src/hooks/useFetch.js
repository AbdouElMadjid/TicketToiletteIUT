import { useCallback, useEffect, useRef } from "react";

export default function useFech () {
    const abordController = useRef(new AbortController())
    useEffect(() => () => abordController.current.abort(), []) 
    
    return useCallback((url, options) => 
        fetch(url, {signal: abordController.current.signal, ...options}),
    [])
}