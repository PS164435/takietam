// resetowanie toczacej kuli przycisk
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ResetBall : MonoBehaviour
{
    private GameObject oldObject;
    public GameObject prefab;
    public Transform spawnPoint;

    private void Start()
    {
        oldObject = Instantiate(prefab, spawnPoint.position, spawnPoint.rotation);

        Vector3 newPosition = spawnPoint.position;
        newPosition.y = 5.854f;
        spawnPoint.position = newPosition;
    }

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Player"))
        {
            Destroy(oldObject);
            oldObject = Instantiate(prefab, spawnPoint.position, spawnPoint.rotation);
            oldObject.name = "Ball";
        }
    }
}
