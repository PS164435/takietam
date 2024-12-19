// piedestaly z otworami na kule
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Pedestals : MonoBehaviour
{
    public GameObject[] lvl;
    public int ballsAmount = 0;
    public float speed;
    public float endPosition;
    public GameObject key;
    private bool isEnded = false;
    private bool isSpawned = false;
    public Vector3 spawnPoint = new Vector3(0f, 0f, 0f);

    void Update()
    {
        if (!isEnded)
        {
            for (int i = 0; i < ballsAmount; i++)
            {
                Vector3 targetPosition = new Vector3(lvl[i].transform.position.x, endPosition, lvl[i].transform.position.z);
                lvl[i].transform.position = Vector3.MoveTowards(lvl[i].transform.position, targetPosition, speed * Time.deltaTime);
                if (ballsAmount == 10 && lvl[9].transform.position == targetPosition)
                {
                    isEnded = true;
                }
            }
            if (ballsAmount==10 && !isSpawned)
            {
                GameObject spawnedKey = Instantiate(key, spawnPoint, Quaternion.identity);
                isSpawned = true;
            }
            
        }
    }

     private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Switch"))
        {
            ballsAmount +=1;
            Destroy(other.gameObject);
        }
    }
}
