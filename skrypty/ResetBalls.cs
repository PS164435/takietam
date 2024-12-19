// resetowanie kul do koszyka przez przycisk
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ResetBalls : MonoBehaviour
{
    private GameObject oldObject;
    public GameObject prefab;
    public Transform spawnPoint;

    private void Start()
    {
        oldObject = Instantiate(prefab, spawnPoint.position, spawnPoint.rotation);
    }

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Player"))
        {
            Destroy(oldObject);
            oldObject = Instantiate(prefab, spawnPoint.position, spawnPoint.rotation);
            oldObject.name = "Balls";
        }
    }
}
