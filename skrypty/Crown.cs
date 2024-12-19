// skrypt korony
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.XR.Interaction.Toolkit;

public class Crown : MonoBehaviour
{
    public float speed = 50f;
    public GameObject objectName;

    void Update()
    {
        transform.Rotate(0, speed * Time.deltaTime, 0);
    }

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Player"))
        {
            objectName.SetActive(true);
            gameObject.SetActive(false);
        }
    }
}