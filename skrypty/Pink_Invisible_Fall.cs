// niewidzialna podloga w rozowej ramce, teleportujaca objekty na ustalone pozycje
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Pink_Invisible_Fall : MonoBehaviour
{
    private GameObject objectResetPosition;

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Switch"))
        {
            BasedPosition2 basedPosition = other.GetComponent<BasedPosition2>();
            GameObject objectResetPosition = Instantiate(other.gameObject, basedPosition.GetBasedPosition(), Quaternion.identity);
            objectResetPosition.name = other.gameObject.name;
            objectResetPosition.GetComponent<Rigidbody>().useGravity = true;
            Destroy(other.gameObject);
        }
    }
}