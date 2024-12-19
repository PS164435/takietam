// zmianakoloru obiektow po trafieniu pociskiem
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Target : MonoBehaviour
{
    public Material MaterialL;
    public Material MaterialR;

    public void OnHitL()
    {       
        Rigidbody rb = GetComponent<Rigidbody>();
        if (rb != null)
        {
            rb.drag = 1000;
            rb.angularDrag  = 1000;
        }
        Renderer renderer = GetComponent<Renderer>();
        renderer.material = MaterialL;
    }
    
    public void OnHitR()
    {       
        Rigidbody rb = GetComponent<Rigidbody>();
        if (rb != null)
        {
            rb.drag = 0;
            rb.angularDrag  = 0;
        }
         Renderer renderer = GetComponent<Renderer>();
        renderer.material = MaterialR;
    }
}